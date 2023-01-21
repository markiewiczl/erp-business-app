<?php

namespace App\Controller;

use App\Form\ChooseCurrencyType;
use App\Repository\FileCatalogueRepository;
use App\Resolver\FileCatalogueCurrencyInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    private FileCatalogueRepository $catalogueRepository;

    private PaginatorInterface $pagination;

    private FileCatalogueCurrencyInterface $fileCatalogueCurrency;

    public function __construct(
        FileCatalogueRepository $catalogueRepository,
        PaginatorInterface $pagination,
        FileCatalogueCurrencyInterface $fileCatalogueCurrency
    ) {
        $this->catalogueRepository = $catalogueRepository;
        $this->pagination = $pagination;
        $this->fileCatalogueCurrency = $fileCatalogueCurrency;
    }


    #[Route('/list/{code}', name: 'app_main_page', defaults: ['code' => 'PLN'])]
    public function index(Request $request, string $code): Response
    {
        $form = $this->createForm(ChooseCurrencyType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()) {
            $code = $form->get('choose')->getData();

            return $this->redirectToRoute('app_main_page', ['code' => $code]);
        }

        $fileCatalogues = $this->catalogueRepository->orderByColumn('asc', 'id');

        if ($code !== 'PLN') {
            $this->fileCatalogueCurrency->convert($code, $fileCatalogues);
        }

        $pagination = $this->pagination->paginate(
            $fileCatalogues,
            $request->query->getInt('page', 1),
            100
        );

        return $this->render('main_page/index.html.twig', [
            'pagination' => $pagination,
            'form' => $form->createView(),
            'code' => $code
        ]);
    }
}