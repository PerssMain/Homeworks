<?php

namespace PerssMain\Tests\Homework_6;

use PerssMain\Src\Homework_2\Data\Vector;
use PerssMain\Src\Homework_2\Objects\UObject;
use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_5\IoCRegister;
use PerssMain\Src\Homework_6\AdapterCreator;
use PerssMain\Src\Homework_6\TankOperationsIMovable;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    /**
     *
     */
    public function setUp(): void
    {

        IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, function () {
            return new IoCRegister();
        })->execute();
        IoC::resolve(IoC::IOC_REGISTER, 'Adapter', function ($interfaceName, $uObject) {
            return AdapterCreator::create(TankOperationsIMovable::class, $uObject);
        })->execute();
        IoC::resolve(IoC::IOC_REGISTER, 'Tank.Operations.IMovable:position.get', function ($object) {
            return $object->getProperty('position');
        })->execute();
        IoC::resolve(
            IoC::IOC_REGISTER,
            'Tank.Operations.IMovable:position.set',
            function ($object, Vector $vector) {
                return $object->setProperty('position', $vector);
            }
        )->execute();
        IoC::resolve(IoC::IOC_REGISTER, 'Tank.Operations.IMovable:velocity.get', function ($object) {
            return $object->getProperty('velocity');
        })->execute();
        parent::setUp();
    }

    /**
     *
     */
    public function testAdapter()
    {
        $testVector = new Vector(10, 10);
        $uObjectMock = $this->createMock(UObject::class);
        $uObjectMock->method('getProperty')->willReturn($testVector);
        $uObjectMock->method('setProperty')->with('position', $testVector);
        $result = IoC::resolve('Adapter', [TankOperationsIMovable::class, $uObjectMock]);
        $result->setPosition($testVector);
        $position = $result->getPosition();
        $this->assertEquals($testVector, $position);
    }
}



