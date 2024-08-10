<?php

$filename = $argv[1] ?? throw new \RuntimeException('Invalid target name');

if (is_file($filename)) {
    unlink($filename);
}

$phar = new Phar($filename);
$phar->buildFromDirectory(dirname(__DIR__));
$stub = $phar->setStub("#!/usr/bin/env php\n".$phar->createDefaultStub('app.php'));
