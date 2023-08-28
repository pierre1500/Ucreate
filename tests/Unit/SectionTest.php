<?php

namespace App\Tests\Unit;


use App\Entity\Section;
use App\Entity\TemplateSite;
use App\Entity\TemplateUser;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SectionTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $Section = new Section();
        $TemplateUser = new TemplateUser();
        $Section->setTemplateUser($TemplateUser);
        $TemplateSite = new TemplateSite();
        $Section->setTemplateSite($TemplateSite);
        $Section->setOrderr(1);
        $Section->setName('test_name_1');


        $errors = $container->get('validator')->validate($Section);

        $this->assertCount(0, $errors);
    }
}
