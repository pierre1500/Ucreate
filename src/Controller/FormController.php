<?php

namespace App\Controller;

use App\Entity\Component;
use App\Entity\Project;
use App\Entity\Section;
use App\Entity\TemplateSite;
use App\Entity\TemplateUser;
use App\Form\TemplateFormType;
use App\Repository\TemplateSiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FormController extends AbstractController
{
    #[Route('/form/{id}', name: 'app_form')]
    public function index(Request $request,EntityManagerInterface $manager, $id,TemplateSiteRepository $templateSiteRepository): Response
    {
        $projet = new Project();
        $selectedTemplate = $templateSiteRepository->find($id);
        $template = new TemplateUser();
        $section = new Section();
        $section2 = new Section();
        $section3 = new Section();
        $component = new Component();
        $component2 = new Component();
        $component3 = new Component();
        $component4 = new Component();
        $component5 = new Component();
        $component6 = new Component();
        $component7 = new Component();
        $component8 = new Component();
        $component9 = new Component();
        $component10 = new Component();
        $component11 = new Component();
        $component12 = new Component();
        $component13 = new Component();
        $component14 = new Component();


        $form = $this->createForm(TemplateFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $logo = $form->get('logo')->getData();
            $titre = $data['Titre'];
            $sousTitre = $data['SousTitre'];
            $imageDeFond = $form->get('Image_de_fond')->getData();
            $titreDeLaDeuxiemeSection = $data['Titre_de_la_deuxieme_section'];
            $sousTitreDeLaDeuxiemeSection = $data['Sous_titre_de_la_deuxieme_section'];
            $imageDeLaDeuxiemeSection = $form->get('Image_de_la_deuxieme_section')->getData();
            $deuxiemeTitreDeLaDeuxiemeSection = $data['Deuxieme_titre_de_la_deuxieme_section'];
            $deuxiemeSousTitreDeLaDeuxiemeSection = $data['Deuxieme_sous_titre_de_la_deuxieme_section'];
            $deuxiemeImageDeLaDeuxiemeSection = $form->get('Deuxieme_image_de_la_deuxieme_section')->getData();
            $troisiemeTitreDeLaDeuxiemeSection = $data['Troisieme_titre_de_la_deuxieme_section'];
            $troisiemeSousTitreDeLaDeuxiemeSection = $data['Troisieme_sous_titre_de_la_deuxieme_section'];
            $troisiemeImageDeLaDeuxiemeSection = $form->get('Troisieme_image_de_la_deuxieme_section')->getData();
            $copiryght = $data['Copyright'];

            $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
            $newFilename = uniqid().'.'.$logo->guessExtension();

            $logo->move(
                $uploadsDirectory,
                $newFilename
            );

            $newFilename2 = uniqid().'.'.$imageDeFond->guessExtension();

            $imageDeFond->move(
                $uploadsDirectory,
                $newFilename2
            );

            $newFilename3 = uniqid().'.'.$imageDeLaDeuxiemeSection->guessExtension();

            $imageDeLaDeuxiemeSection->move(
                $uploadsDirectory,
                $newFilename3
            );

            $newFilename4 = uniqid().'.'.$deuxiemeImageDeLaDeuxiemeSection->guessExtension();

            $deuxiemeImageDeLaDeuxiemeSection->move(
                $uploadsDirectory,
                $newFilename4
            );

            $newFilename5 = uniqid().'.'.$troisiemeImageDeLaDeuxiemeSection->guessExtension();

            $troisiemeImageDeLaDeuxiemeSection->move(
                $uploadsDirectory,
                $newFilename5
            );

            $template->setName($selectedTemplate->getName());
            $template->setTemplate($selectedTemplate);
            $manager->persist($template);
            $manager->flush();

            $projet->setUser($this->getUser());
            $projet->setTemplate($selectedTemplate);
            $projet->setTemplateUser($template);
            $projet->setState("Working");
            $manager->persist($projet);
            $manager->flush();

            $section->setTemplateUser($template);
            $section->setOrderr(1);
            $section->setName("Section 1");

            $section2->setTemplateUser($template);
            $section2->setOrderr(2);
            $section2->setName("Section 2");

            $section3->setTemplateUser($template);
            $section3->setOrderr(3);
            $section3->setName("Section 3");
            $manager->persist($section);
            $manager->persist($section2);
            $manager->persist($section3);
            $manager->flush();

            $component->setSection($section);
            $component->setReference("logo");
            $component->setType("image");
            $component->setValue($newFilename);

            $component2->setSection($section);
            $component2->setReference("Titre");
            $component2->setType("text");
            $component2->setValue($titre);

            $component3->setSection($section);
            $component3->setReference("Sous-titre");
            $component3->setType("text");
            $component3->setValue($sousTitre);

            $component4->setSection($section);
            $component4->setReference("image_fond");
            $component4->setType("image");
            $component4->setValue($newFilename2);

            $component5->setSection($section2);
            $component5->setReference("Titre0");
            $component5->setType("text");
            $component5->setValue($titreDeLaDeuxiemeSection);

            $component6->setSection($section2);
            $component6->setReference("Sous-titre0");
            $component6->setType("text");
            $component6->setValue($sousTitreDeLaDeuxiemeSection);

            $component7->setSection($section2);
            $component7->setReference("image");
            $component7->setType("image");
            $component7->setValue($newFilename3);

            $component8->setSection($section2);
            $component8->setReference("Titre1");
            $component8->setType("text");
            $component8->setValue($deuxiemeTitreDeLaDeuxiemeSection);

            $component9->setSection($section2);
            $component9->setReference("Sous-titre1");
            $component9->setType("text");
            $component9->setValue($deuxiemeSousTitreDeLaDeuxiemeSection);

            $component10->setSection($section2);
            $component10->setReference("image1");
            $component10->setType("image");
            $component10->setValue($newFilename4);

            $component11->setSection($section2);
            $component11->setReference("Titre2");
            $component11->setType("text");
            $component11->setValue($troisiemeTitreDeLaDeuxiemeSection);

            $component12->setSection($section2);
            $component12->setReference("Sous-titre2");
            $component12->setType("text");
            $component12->setValue($troisiemeSousTitreDeLaDeuxiemeSection);

            $component13->setSection($section2);
            $component13->setReference("image2");
            $component13->setType("image");
            $component13->setValue($newFilename5);

            $component14->setSection($section3);
            $component14->setReference("Copyright");
            $component14->setType("text");
            $component14->setValue($copiryght);

            $manager->persist($component);
            $manager->persist($component2);
            $manager->persist($component3);
            $manager->persist($component4);
            $manager->persist($component5);
            $manager->persist($component6);
            $manager->persist($component7);
            $manager->persist($component8);
            $manager->persist($component9);
            $manager->persist($component10);
            $manager->persist($component11);
            $manager->persist($component12);
            $manager->persist($component13);
            $manager->persist($component14);
            $manager->flush();
            $this->redirect('/');
        }

        return $this->render("form/index.html.twig", [
            'controller_name' => 'FormController',
            'form' => $form->createView()
        ]);
    }
}
