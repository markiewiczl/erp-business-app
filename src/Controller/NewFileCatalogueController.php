<?php

namespace App\Controller;

use App\Entity\FileCatalogue;
use App\Form\NewFileCatalogueFormType;
use App\Repository\FileCatalogueRepository;
use App\Resolver\FileUploaderResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewFileCatalogueController extends AbstractController
{
    private FileUploaderResolverInterface $uploader;

    private FileCatalogueRepository $fileCatalogueRepository;

    public function __construct(
        FileUploaderResolverInterface $uploader,
        FileCatalogueRepository $fileCatalogueRepository
    )
    {
        $this->uploader = $uploader;
        $this->fileCatalogueRepository = $fileCatalogueRepository;
    }

    #[Route('/new/file/catalogue', name: 'app_new_file_catalogue')]
    public function index(Request $request): Response
    {
        $fileCatalogue = new FileCatalogue();

        $form = $this->createForm(NewFileCatalogueFormType::class, $fileCatalogue);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();

            if ($image) {
                $imageName = $this->uploader->upload($image);
                $fileCatalogue->setImage($imageName);
            }

            $fileCatalogue = $form->getData();

            $this->fileCatalogueRepository->save($fileCatalogue, true);

            return $this->redirectToRoute('app_main_page');
        }

        return $this->renderForm('new_file_catalogue/index.html.twig', [
            'form' => $form,
        ]);
    }
}
