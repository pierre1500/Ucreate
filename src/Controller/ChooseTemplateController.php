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
        if(!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        $templates = $templateSiteRepository->findAll();
        return $this->render('choose_template/index.html.twig', [
            'templates' => $templates
        ]);
    }

    #[Route('/template/{id}', name: 'app_template')]
    public function preview($id, TemplateSiteRepository $templateSiteRepository): Response
    {
        $template = $templateSiteRepository->find($id);
        return $this->render('choose_template/template.html.twig', [
            'template' => $template
        ]);
    }

}
