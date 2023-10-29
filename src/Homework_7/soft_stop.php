<?php

use PerssMain\Src\Homework_7\ThreadManager;

include __DIR__ . '/../../vendor/autoload.php';

$pid = ThreadManager::getPid();

if (ThreadManager::isAlreadyStarted()) {
    ThreadManager::invokeSoftStop();
    echo 'soft stop invoked';
} else {
    echo 'not run';
}
echo PHP_EOL;