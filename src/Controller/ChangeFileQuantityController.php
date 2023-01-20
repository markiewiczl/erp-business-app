<?php

namespace App\Controller;

use App\Repository\FileCatalogueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangeFileQuantityController extends AbstractController
{
    private FileCatalogueRepository $fileCatalogueRepository;

    public function __construct(FileCatalogueRepository $fileCatalogueRepository)
    {
        $this->fileCatalogueRepository = $fileCatalogueRepository;
    }

    #[Route('/change-file-quantity/{changedFilesId}', name: 'app_change_file_quantity')]
    public function index(Request $request, string $changedFilesId): Response
    {
        $arrayId = explode('-', $changedFilesId);
        $fileCatalogues = [];

        foreach ($arrayId as $key=>$id) {
            $fileCatalogues[$key] = $this->fileCatalogueRepository->findOneBy(['id' => $id]);
        }

        return $this->render('change_file_quantity/index.html.twig', [
            'fileCatalogues' => $fileCatalogues,
            'changedFilesId' => $changedFilesId
        ]);
    }
}
