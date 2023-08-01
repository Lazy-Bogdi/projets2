<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    private $security;
    private $em;    
    
    public function __construct(EntityManagerInterface $em,Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }
    // #[Route('/search', name: 'app_search')]
    public function index(Request $request, ArticleRepository $articleRepo): Response
    {
        $search = $request->query->get('q');
        // dd($search);
        $articlesbySearch = $articleRepo->findBySearch($search);
        return $this->render('search/index.html.twig', [
            'articles' => $articlesbySearch,
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(Request $request, ArticleRepository $articleRepo): Response
    {
        // create a new instance of the search form
        $form = $this->createForm(SearchFormType::class);

        // handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // get the search term from the form data
            $searchTerm = $form->get('search')->getData();
            $articlesbySearch = $articleRepo->findBySearch($searchTerm);

            // render the search results template with the search results
            return $this->render('search/results.html.twig', [
                'searchTerm' => $searchTerm,
                'articlesbySearch' => $articlesbySearch,
            ]);
        }

        // render the search form template
        return $this->render('base.html.twig', [
            'form' => $form,
        ]);
    }
}
