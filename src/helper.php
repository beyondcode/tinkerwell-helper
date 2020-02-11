<?php

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

if (! function_exists('tinker')) {
    function tinker(...$args)
    {
        /*
         * Thank you Caleb
         * See: https://github.com/calebporzio/awesome-helpers/blob/master/src/helpers/tinker.php
         */
        $namedParameters = Collection::make(debug_backtrace())
            ->where('function', 'tinker')->take(1)
            ->map(function ($slice) {
                return array_values($slice);
            })
            ->mapSpread(function ($filePath, $lineNumber, $function, $args) {
                return file($filePath)[$lineNumber - 1];
                // "    tinker($post, new User);"
            })->map(function ($carry) {
                return Str::before(Str::after($carry, 'tinker('), ');');
                // "$post, new User"
            })->flatMap(function ($carry) {
                return array_map('trim', explode(',', $carry));
                // ["post", "new User"]
            })->map(function ($carry, $index) {
                return strpos($carry, '$') === 0
                    ? Str::after($carry, '$')
                    : 'temp'.$index;
                // ["post", "temp1"]
            })
            ->combine($args)
            ->all();

        //exec('open "tinkerwell://?cwd='.base64_encode(base_path()).'&scope='.base64_encode(serialize($namedParameters)).'"');

        // For MacOS
        $command = 'open "tinkerwell://?cwd='.base64_encode(base_path()).'&scope='.base64_encode(serialize($namedParameters)).'"';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $logPath = base_path() . '\\storage\\logs\\tinkerwell-' . date("Y-m-d") . '.log';

            // For Windows || ATTENTION ... I added a ^ before the & to escape it.
            // If base64 encoded string of $namedParameters lenght is too long (I don't know what the limit is) the execution will fail
            $command ='start tinkerwell://?cwd='.base64_encode(base_path()) .'^&scope='.base64_encode(serialize($namedParameters)) . ' >> ' . $logPath . ' 2>&1';
        }

        $process = new Process($command);

        try {
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

        } catch (ProcessFailedException $exception) {
            Log::error($exception->getMessage());
        }
    }
}
