<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Project;
use App\Entity\Section;
use App\Entity\Component;
use App\Entity\TemplateSite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hash = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setName('Maxime');
        $user->setLastname('Gaspard');
        $user->setEmail('maxime.gaspard@gmail.com');
        $user->setPassword($this->hash->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $template = new TemplateSite();
        $template->setName('Template 1');
        $manager->persist($template);

        $project = new Project();
        $project->setDomain('Domain du projet n°1');
        $project->setState('Working');
        $project->setUser($user);
        $project->setTemplate($template);
        $manager->persist($project);

        $section = new Section();
        $section->setOrderr(1);
        $section->setName('Section 1');
        $section->setTemplate($template);
        $manager->persist($section);

        $section2 = new Section();
        $section2->setOrderr(2);
        $section2->setName('Section 2');
        $section2->setTemplate($template);
        $manager->persist($section2);

        $section3 = new Section();
        $section3->setOrderr(3);
        $section3->setName('Section 3');
        $section3->setTemplate($template);
        $manager->persist($section3);

        $component = new Component();
        $component->setReference('logo');
        $component->setType('image');
        $component->setValue('/uploads/images/logo.png');
        $component->setSection($section);
        $manager->persist($component);

        $component1 = new Component();
        $component1->setReference('Titre');
        $component1->setType('text');
        $component1->setValue('Titre');
        $component1->setSection($section);
        $manager->persist($component1);

        $component2 = new Component();
        $component2->setReference('Sous-titre');
        $component2->setType('text');
        $component2->setValue('Sous-titre');
        $component2->setSection($section);
        $manager->persist($component2);

        $component3 = new Component();
        $component3->setReference('image_fond');
        $component3->setType('image');
        $component3->setValue('/uploads/images/image_fond.png');
        $component3->setSection($section);
        $manager->persist($component3);

        $component_2 = new Component();
        $component_2->setReference('Titre');
        $component_2->setType('text');
        $component_2->setValue('Titre');
        $component_2->setSection($section2);
        $manager->persist($component_2);

        $component1_2 = new Component();
        $component1_2->setReference('Sous-titre');
        $component1_2->setType('text');
        $component1_2->setValue('Sous-titre');
        $component1_2->setSection($section2);
        $manager->persist($component1_2);

        $component2_2 = new Component();
        $component2_2->setReference('image');
        $component2_2->setType('image');
        $component2_2->setValue('/uploads/images/image1.png');
        $component2_2->setSection($section2);
        $manager->persist($component2_2);

        $component3_2 = new Component();
        $component3_2->setReference('Titre1');
        $component3_2->setType('text');
        $component3_2->setValue('Titre1');
        $component3_2->setSection($section2);
        $manager->persist($component3_2);

        $component4_2 = new Component();
        $component4_2->setReference('Sous-titre1');
        $component4_2->setType('text');
        $component4_2->setValue('Sous-titre1');
        $component4_2->setSection($section2);
        $manager->persist($component4_2);

        $component5_2 = new Component();
        $component5_2->setReference('image1');
        $component5_2->setType('image');
        $component5_2->setValue('/uploads/images/image2.png');
        $component5_2->setSection($section2);
        $manager->persist($component5_2);

        $component6_2 = new Component();
        $component6_2->setReference('Titre2');
        $component6_2->setType('text');
        $component6_2->setValue('Titre2');
        $component6_2->setSection($section2);
        $manager->persist($component6_2);

        $component7_2 = new Component();
        $component7_2->setReference('Sous-titre2');
        $component7_2->setType('text');
        $component7_2->setValue('Sous-titre2');
        $component7_2->setSection($section2);
        $manager->persist($component7_2);

        $component8_2 = new Component();
        $component8_2->setReference('image2');
        $component8_2->setType('image');
        $component8_2->setValue('/uploads/images/image3.png');
        $component8_2->setSection($section2);
        $manager->persist($component8_2);

        $component_3 = new Component();
        $component_3->setReference('Copiright');
        $component_3->setType('text');
        $component_3->setValue('Copiright');
        $component_3->setSection($section3);
        $manager->persist($component_3);


        $manager->flush();
    }
}