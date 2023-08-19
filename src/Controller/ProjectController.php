<?php

namespace App\Controller;

use App\Entity\Component;
use App\Entity\Section;
use App\Entity\TemplateUser;
use App\Form\DomainFormType;
use App\Form\TemplateFormType;
use App\Repository\ComponentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SectionRepository;
use App\Repository\TemplateUserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;


class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project', methods: ['GET', 'POST'])]
    public function index(ProjectRepository $projectRepository, EntityManagerInterface $manager,Request $request): Response
    {
        $projectId = $request->request->get('project_id');
        // récupère le domaine de via project with $id
        $domain = $projectRepository->findOneBy(['id' => $projectId]);
        $form = $this->createForm(DomainFormType::class, [
         'domain' => $domain->get
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('domain')->getData() != $domain) {
                $domain = $form->get('domain')->getData();
                $manager->persist($domain);
                $manager->flush();
            }
            return $this->redirectToRoute('app_project');
        }
        $id = $this->getUser()->getId();
        $projects = $projectRepository->findBy(['user' => $id]);
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'projects' => $projects,
            'form' => $form->createView()
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

        $Titre1 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Titre1']);
        $SousTitre1 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Sous-titre1']);
        $Image1 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'image1']);
        $Titre2 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Titre2']);
        $SousTitre2 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'Sous-titre2']);
        $Image2 = $componentRepository->findOneBy(['section' => $section2, 'reference' => 'image2']);

        $CopyRight = $componentRepository->findOneBy(['section' => $section3, 'reference' => 'CopyRight']);
        return $this->render("template_var/{$template_name}/index.html.twig", [
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

    #[Route('/project/{id}/delete', name: 'app_project_delete')]
    public function delete($id, ProjectRepository $projectRepository, EntityManagerInterface $manager): Response
    {
        $project = $projectRepository->findOneBy(['id' => $id]);
        $template_user = $project->getTemplateUser();
        $template = $manager->getRepository(TemplateUser::class)->findOneBy(['id' => $template_user]);
        $sections = $manager->getRepository(Section::class)->findBy(['templateUser' => $template_user]);
        foreach ($sections as $section) {
            $components = $manager->getRepository(Component::class)->findBy(['section' => $section]);
            foreach ($components as $component) {
                $manager->remove($component);
            }
            $manager->remove($section);
        }
        $manager->remove($template);
        $manager->remove($project);
        $manager->flush();

        return $this->redirectToRoute('app_project');
    }



    #[Route('/project/{id}/edit', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit($id,ProjectRepository $projectRepository, Request $request, EntityManagerInterface $manager): Response
    {
        $template_user = $projectRepository->findOneBy(['id' => $id])->getTemplateUser();
        // Récupère les 3 sections du template
        $section = $manager->getRepository(Section::class)->findOneBy(['templateUser' => $template_user, 'orderr' => 1]);
        $section2 = $manager->getRepository(Section::class)->findOneBy(['templateUser' => $template_user, 'orderr' => 2]);
        $section3 = $manager->getRepository(Section::class)->findOneBy(['templateUser' => $template_user, 'orderr' => 3]);
        // Récupère les composants de la section 1
        $logo = $manager->getRepository(Component::class)->findOneBy(['section' => $section, 'reference' => 'logo']);
        $Titre = $manager->getRepository(Component::class)->findOneBy(['section' => $section, 'reference' => 'Titre']);
        $SousTitre = $manager->getRepository(Component::class)->findOneBy(['section' => $section, 'reference' => 'Sous-titre']);
        $ImageDeFond = $manager->getRepository(Component::class)->findOneBy(['section' => $section, 'reference' => 'image_fond']);
        // Récupère les composants de la section 2
        $Titre0 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Titre0']);
        $SousTitre0 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Sous-titre0']);
        $Image = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'image']);
        $Titre1 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Titre1']);
        $SousTitre1 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Sous-titre1']);
        $Image1 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'image1']);
        $Titre2 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Titre2']);
        $SousTitre2 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'Sous-titre2']);
        $Image2 = $manager->getRepository(Component::class)->findOneBy(['section' => $section2, 'reference' => 'image2']);
        $CopyRight = $manager->getRepository(Component::class)->findOneBy(['section' => $section3, 'reference' => 'CopyRight']);

        $form = $this->createForm(TemplateFormType::class, [
            'logo' => $logo,
            'Titre' => $Titre->getValue(),
            'SousTitre' => $SousTitre->getValue(),
            'Image_de_fond' => $ImageDeFond,
            'Titre_de_la_deuxieme_section' => $Titre0->getValue(),
            'Sous_titre_de_la_deuxieme_section' => $SousTitre0->getValue(),
            'Image_de_la_deuxieme_section' => $Image,
            'Deuxieme_titre_de_la_deuxieme_section' => $Titre1->getValue(),
            'Deuxieme_sous_titre_de_la_deuxieme_section' => $SousTitre1->getValue(),
            'Deuxieme_image_de_la_deuxieme_section' => $Image1,
            'Troisieme_titre_de_la_deuxieme_section' => $Titre2->getValue(),
            'Troisieme_sous_titre_de_la_deuxieme_section' => $SousTitre2->getValue(),
            'Troisieme_image_de_la_deuxieme_section' => $Image2,
                'Copyright' => $CopyRight->getValue(),
        ]
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $component = $form->getData();
            $Titre->setValue($component['Titre']);
            $SousTitre->setValue($component['SousTitre']);
            $Titre0->setValue($component['Titre_de_la_deuxieme_section']);
            $SousTitre0->setValue($component['Sous_titre_de_la_deuxieme_section']);
            $Titre1->setValue($component['Deuxieme_titre_de_la_deuxieme_section']);
            $SousTitre1->setValue($component['Deuxieme_sous_titre_de_la_deuxieme_section']);
            $Titre2->setValue($component['Troisieme_titre_de_la_deuxieme_section']);
            $SousTitre2->setValue($component['Troisieme_sous_titre_de_la_deuxieme_section']);
            $CopyRight->setValue($component['Copyright']);

            // Gestion des images
            if ($form->get('logo')->getData()) {
                $logo_file = $form->get('logo')->getData();
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
                $newFilename = uniqid() . '.' . $logo_file->guessExtension();
                $logo_file->move(
                    $uploadsDirectory,
                    $newFilename
                );
                $logo->setValue($newFilename);
                $manager->persist($logo);
            }
            if ($form->get('Image_de_fond')->getData()) {
                $ImageDeFond_file = $form->get('Image_de_fond')->getData();
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
                $newFilename = uniqid() . '.' . $ImageDeFond_file->guessExtension();
                $ImageDeFond_file->move(
                    $uploadsDirectory,
                    $newFilename
                );
                $ImageDeFond->setValue($newFilename);
                $manager->persist($ImageDeFond);
            }
            if ($form->get('Image_de_la_deuxieme_section')->getData()) {
                $Image_file = $form->get('Image_de_la_deuxieme_section')->getData();
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
                $newFilename = uniqid() . '.' . $Image_file->guessExtension();
                $Image_file->move(
                    $uploadsDirectory,
                    $newFilename
                );
                $Image->setValue($newFilename);
                $manager->persist($Image);
            }
            if ($form->get('Deuxieme_image_de_la_deuxieme_section')->getData()) {
                $Image1_file = $form->get('Deuxieme_image_de_la_deuxieme_section')->getData();
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
                $newFilename = uniqid() . '.' . $Image1_file->guessExtension();
                $Image1_file->move(
                    $uploadsDirectory,
                    $newFilename
                );
                $Image1->setValue($newFilename);
                $manager->persist($Image1);
            }
            if ($form->get('Troisieme_image_de_la_deuxieme_section')->getData()) {
                $Image2_file = $form->get('Troisieme_image_de_la_deuxieme_section')->getData();
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads_directory';
                $newFilename = uniqid() . '.' . $Image2_file->guessExtension();
                $Image2_file->move(
                    $uploadsDirectory,
                    $newFilename
                );
                $Image2->setValue($newFilename);
                $manager->persist($Image2);
            }

            $manager->persist($Titre);
            $manager->persist($SousTitre);
            $manager->persist($Titre0);
            $manager->persist($SousTitre0);
            $manager->persist($Titre1);
            $manager->persist($SousTitre1);
            $manager->persist($Titre2);
            $manager->persist($SousTitre2);
            $manager->persist($CopyRight);
            /*$userComponents = $manager->getRepository(Component::class)->findBy(['section' => [$section, $section2, $section3]]);

            $updatedComponents = [];

            foreach ($userComponents as $userComponent) {
                $updatedComponents[$userComponent->getReference()] = $userComponent;
                $manager->persist($userComponent);
            }*/
            $manager->flush();
            return $this->redirectToRoute('app_project');
        }
        return $this->render('project/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
