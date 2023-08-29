<?php

namespace App\Tests\Unit;


use App\Entity\Project;
use App\Entity\TemplateSite;
use App\Entity\TemplateUser;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProjectTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $Project = new Project();
        $User = new User();
        $Project->setUser($User);
        $TemplateSite = new TemplateSite();
        $Project->setTemplate($TemplateSite);
        $TemplateUser = new TemplateUser();
        $Project->setTemplateUser($TemplateUser);
        $Project->setDomain('test_domain_1');
        $Project->setState('test_state_1');


        $errors = $container->get('validator')->validate($Project);

        $this->assertCount(0, $errors);
    }
}
