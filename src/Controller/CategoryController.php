<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\Category1Type;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/category')]
class CategoryController extends AbstractController
{
    private $security;
    private $em;

    public function __construct(EntityManagerInterface $em, Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }

    #[Route('/', name: 'app_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, Request $request, PaginatorInterface $paginator): Response
    {
        if (!empty($request->cookies->get('user_timezone'))) {
            $this->getUser()->setTimeZone($request->cookies->get('user_timezone'));
            $this->em->persist($this->getUser());
            $this->em->flush();
        }
    
        $query = $categoryRepository->createQueryBuilder('c')->getQuery();
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            20 // 4 categories per line * 5 lines = 20 categories per page
        );
    
        return $this->render('category/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
    #[Route('/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        $articles = $category->getArticles();
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'articles' => $articles
        ]);
    }


}