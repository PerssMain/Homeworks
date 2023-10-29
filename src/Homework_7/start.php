<?php

declare(ticks=1);

use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_7\Runner;
use PerssMain\Src\Homework_7\ThreadManager;
use PerssMain\Src\Homework_5\IoCRegister;

include __DIR__ . '/../../vendor/autoload.php';

if (ThreadManager::isAlreadyStarted()) {
    die('already started' . PHP_EOL);
}

$pid = pcntl_fork();

if ($pid == -1) {
    die("Не удалось породить процесс");
} elseif ($pid) {
    exit();
} else {
    IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
        return new IoCRegister();
    })->execute();
    IoC::resolve(IoC::IOC_REGISTER, 'Queue', function () {
        return new SplQueue();
    })->execute();

    ThreadManager::start();
    ThreadManager::setSignalHandlers();
    // // Бесконечный цикл выполнения задач
    $runner = new Runner();
    $runner->execute();
}

// Открепление от управляющего терминала
if (posix_setsid() == -1) {
    die("Не удалось открепить от терминала");
}
exit();
