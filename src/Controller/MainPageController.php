<?php

namespace App\Controller;

use App\Form\CheckingBoxType;
use App\Repository\FileCatalogueRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    private FileCatalogueRepository $catalogueRepository;

    private PaginatorInterface $pagination;

    private RequestStack $request;

    public function __construct(
        FileCatalogueRepository $catalogueRepository,
        PaginatorInterface $pagination,
        RequestStack $request
    )
    {
        $this->catalogueRepository = $catalogueRepository;
        $this->pagination = $pagination;
        $this->request = $request;
    }


    #[Route('/', name: 'app_main_page')]
    public function index(Request $request): Response
    {
        $fileCatalogues = $this->catalogueRepository->findAll();

        $pagination = $this->pagination->paginate(
            $fileCatalogues,
            $this->request->getCurrentRequest()->query->getInt('page', 1),
            100
        );

        $form = $this->createForm(CheckingBoxType::class);

        if (!$request->hasSession()) {
            var_dump($request->getContent());
        }

        return $this->render('main_page/index.html.twig', [
            'pagination' => $pagination,
            'form' => $form->createView()
        ]);
    }
}
