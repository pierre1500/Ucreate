<?php

namespace App\Tests\Unit;

use App\Entity\Component;
use App\Entity\Section;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ComponentTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $Component = new Component();
        $Component->setReference('test_reference_1');
        $Component->setType('test_type_1');
        $Component->setValue('test_value_1');
        $Section = new Section();
        $Component->setSection($Section);


        $errors = $container->get('validator')->validate($Component);

        $this->assertCount(0, $errors);
    }
}
