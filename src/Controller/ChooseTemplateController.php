<?php

namespace App\Controller;

use App\Repository\TemplateSiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChooseTemplateController extends AbstractController
{
    #[Route('/template', name: 'app_choose_template')]
    public function index(TemplateSiteRepository $templateSiteRepository): Response
    {
        ## Récupération de tous les templates
        $templates = $templateSiteRepository->findAll();
        return $this->render('choose_template/index.html.twig', [
            'controller_name' => 'ChooseTemplateController',
            'templates' => $templates
        ]);
    }

    #[Route('/template/{id}', name: 'app_template')]
    public function template(TemplateSiteRepository $templateSiteRepository): Response
    {
        return $this->render('choose_template/template.html.twig', [
            'controller_name' => 'ChooseTemplateController',
        ]);
    }
}
