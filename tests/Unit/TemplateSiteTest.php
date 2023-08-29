<?php

namespace App\Tests\Unit;

use App\Entity\TemplateSite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TemplateSiteTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $TemplateSite = new TemplateSite();
        $TemplateSite->setName('test_template_1');
        $TemplateSite->setImage('test_image_1');

        $errors = $container->get('validator')->validate($TemplateSite);

        $this->assertCount(0, $errors);
    }
}
