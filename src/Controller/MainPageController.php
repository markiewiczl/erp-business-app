<?php

namespace App\Controller;

use App\Repository\FileCatalogueRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    private FileCatalogueRepository $catalogueRepository;

    private PaginatorInterface $pagination;

    public function __construct(
        FileCatalogueRepository $catalogueRepository,
        PaginatorInterface $pagination,
    )
    {
        $this->catalogueRepository = $catalogueRepository;
        $this->pagination = $pagination;
    }


    #[Route('/', name: 'app_main_page')]
    public function index(Request $request): Response
    {
        $fileCatalogues = $this->catalogueRepository->orderByColumn('asc', 'id');

        $pagination = $this->pagination->paginate(
            $fileCatalogues,
            $request->query->getInt('page', 1),
            100
        );

        return $this->render('main_page/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/?column={column}&order={order}', name: 'app_main_page_ordered')]
    public function indexOrdered(Request $request, string $column, string $order): Response
{
    $fileCatalogues = $this->catalogueRepository->orderByColumn($order, $column);

    $pagination = $this->pagination->paginate(
        $fileCatalogues,
        $request->query->getInt('page', 1),
        100
    );

    return $this->render('main_page/index.html.twig', [
        'pagination' => $pagination,
    ]);
}
}