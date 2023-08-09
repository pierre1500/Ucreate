<?php

namespace App\Controller;

use App\Repository\ComponentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SectionRepository;
use App\Repository\TemplateSiteRepository;
use App\Repository\TemplateUserRepository;
use App\Service\TemplateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $id = $this->getUser()->getId();
        $projects = $projectRepository->findBy(['user' => $id]);
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'projects' => $projects
        ]);
    }

    #[Route('/project/{id}', name: 'app_project_show')]
    public function show($id, SectionRepository $sectionRepository, ComponentRepository $componentRepository, ProjectRepository $projectRepository,TemplateUserRepository $templateUserRepository): Response
    {
        $project = $projectRepository->findOneBy(['id' => $id]);
        $id_template = $project->getTemplateUser();
        $template_name = $templateUserRepository->findOneBy(['id' => $id_template])->getName();

        $section = $sectionRepository->findOneBy(['templateUser' => $id_template, 'orderr' => 1]);
        $section2 = $sectionRepository->findOneBy(['templateUser' => $id_template, 'orderr' => 2]);
        $section3 = $sectionRepository->findOneBy(['templateUser' => $id_template, 'orderr' => 3]);

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
        return $this->render('template_var/'.$template_name.'/index.html.twig', [
            'controller_name' => 'ProjectController',
            'logo' => $logo,
            'Titre' => $Titre,
            'SousTitre' => $SousTitre,
            'ImageDeFond' => $ImageDeFond,
            'Titre0' => $Titre0,
            'SousTitre0' => $SousTitre0,
            'Image' => $Image,
            'Titre1' => $Titre1,
            'SousTitre1' => $SousTitre1,
            'Image1' => $Image1,
            'Titre2' => $Titre2,
            'SousTitre2' => $SousTitre2,
            'Image2' => $Image2,
            'CopyRight' => $CopyRight,
        ]);
    }
}
