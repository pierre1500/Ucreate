<?php

namespace App\Controller;

use App\Repository\ComponentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SectionRepository;
use App\Repository\TemplateSiteRepository;
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
    public function show(ProjectRepository $projectRepository, $id, TemplateService $templateService, SectionRepository $sectionRepository, ComponentRepository $componentRepository, TemplateSiteRepository $templateSiteRepository): Response
    {
        $project = $projectRepository->find($id);
        $template = $templateSiteRepository->find($id);
        $templateService->generateTemplateUser($id, $sectionRepository, $componentRepository);
        return $this->render('project/show.html.twig', [
            'controller_name' => 'ProjectController',
            'project' => $project,
            'template' => $template
        ]);
    }
}
