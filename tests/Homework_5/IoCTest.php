<?php

namespace PerssMain\Tests\Homework_5;

use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_5\IoCRegister;
use PHPUnit\Framework\TestCase;

class IoCTest extends TestCase
{
    public function setUp(): void
    {
        IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
            return new IoCRegister();
        })->execute();
        IoC::resolve(IoC::SCOPE_NEW, "Scope1");
        IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
            return new IoCRegister();
        })->execute();
        IoC::resolve(IoC::SCOPE_CURRENT, IoC::DEFAULT_SCOPE);
    }

    public function testIoCScopes(): void
    {
        $testTextPart = 'some dynamic text';
        IoC::resolve(
            IoC::IOC_REGISTER,
            "Test",
            static function ($testString) {
                return 'default scope test text ' . $testString;
            }
        )->execute();
        $string = IoC::resolve('Test', [$testTextPart]);
        $this->assertEquals('default scope test text ' . $testTextPart, $string);
        IoC::resolve(IoC::SCOPE_NEW, "Scope1");
        IoC::resolve(IoC::SCOPE_CURRENT, "Scope1");
        IoC::resolve(
            IoC::IOC_REGISTER,
            "Test",
            static function ($testString) {
                return 'scope1 test text ' . $testString;
            }
        )->execute();
        $string = IoC::resolve('Test', [$testTextPart]);
        $this->assertEquals('scope1 test text ' . $testTextPart, $string);
        IoC::resolve(IoC::SCOPE_CURRENT, IoC::DEFAULT_SCOPE);
        $string = IoC::resolve('Test', [$testTextPart]);
        $this->assertEquals('default scope test text ' . $testTextPart, $string);
    }
}
