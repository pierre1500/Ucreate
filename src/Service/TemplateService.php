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
        $section = $sectionRepository->findOneBy(['templateUser' => $id, 'orderr' => 1]);
        $section2 = $sectionRepository->findOneBy(['templateUser' => $id, 'orderr' => 2]);
        $section3 = $sectionRepository->findOneBy(['templateUser' => $id, 'orderr' => 3]);

        $logo = $componentRepository->findOneBy(['section' => $section, 'reference' => 'logo']);
        $Titre = $componentRepository->findOneBy(['section' => $section, 'reference' => 'Titre']);
        $SousTitre = $componentRepository->findOneBy(['section' => $section, 'reference' => 'Sous-titre']);
        $ImageDeFond = $componentRepository->findOneBy(['section' => $section, 'reference' => 'image_fond']);
        $Titre0 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Titre0']);
        $SousTitre0 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Sous-titre0']);
        $Image = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'image']);
        $Titre1 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'Titre1']);
        $SousTitre1 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'Sous-titre1']);
        $Image1 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'image1']);
        $Titre2 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'Titre2']);
        $SousTitre2 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'Sous-titre2']);
        $Image2 = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'image2']);
        $CopyRight = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'CopyRight']);
    }

}