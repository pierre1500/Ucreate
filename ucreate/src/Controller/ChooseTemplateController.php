<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChooseTemplateController extends AbstractController
{
    #[Route('/choose/template', name: 'app_choose_template')]
    public function index(): Response
    {
        return $this->render('choose_template/index.html.twig', [
            'controller_name' => 'ChooseTemplateController',
        ]);
    }
}
