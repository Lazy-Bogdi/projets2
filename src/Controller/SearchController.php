<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(Request $request, ArticleRepository $articleRepo): Response
    {
        $search = $request->query->get('q');
        // dd($search);
        $articlesbySearch = $articleRepo->findBySearch($search);
        return $this->render('search/index.html.twig', [
            'articles' => $articlesbySearch,
        ]);
    }
}
