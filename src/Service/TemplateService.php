<?php

namespace App\Service;
use App\Entity\Project;
use App\Entity\TemplateUser;
use App\Repository\ComponentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SectionRepository;
use App\Repository\TemplateUserRepository;
use Doctrine\ORM\EntityManagerInterface;

class TemplateService {

    public function generateTemplateUser($id, SectionRepository $sectionRepository, ComponentRepository $componentRepository)
    {
        // select the section who template_user_id is $id and order = 1

    }

}