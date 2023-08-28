<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Article;
use App\Entity\Comment;

use App\Form\Article1Type;
use App\Form\Comment1Type;
use App\Form\ArticleDoneType;
use App\Entity\UserCompletedCourse;
use App\Service\UserHistoryService;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/article')]
class ArticleController extends AbstractController
{
    private $security;
    private $em;
    private $userHistoryService;

    public function __construct(EntityManagerInterface $em, Security $security, UserHistoryService $userHistoryService)
    {
        $this->em = $em;
        $this->security = $security;
        $this->userHistoryService = $userHistoryService;
    }

    #[Route('/{id}', name: 'app_article_show', methods: ['GET', 'POST'])]
    public function show(Article $article, CommentRepository $commentRepository, Request $request): Response
    {
        // if (!$this->isGranted('ROLE_USER')) {
        //     // If not, redirect the user to a login page
        //     return $this->redirectToRoute('app_login');
        // }

        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY') && $request->attributes->get('_route') !== 'login') {
            return $this->redirectToRoute('app_login_route');
        }

        $courseCompleted = false;
        if ($this->getUser()) {
            $repository = $this->em->getRepository(UserCompletedCourse::class);
            $completedCourse = $repository->findOneBy([
                'user' => $this->getUser(),
                'article' => $article
            ]);
            if ($completedCourse) {
                $courseCompleted = true;
            }
        }
        $this->userHistoryService->addToHistory($this->getUser(), $article, $this->getUser()->getTimezone());
        $comment = new Comment();
        $comment->setCreatedAt(new DateTimeImmutable);
        $comment->setUser($this->getUser());
        $comment->setArticle($article);

        $formComment = $this->createForm(Comment1Type::class, $comment);
        $formComment->handleRequest($request);


        if ($formComment->isSubmitted() && $formComment->isValid()) {
            $commentRepository->save($comment, true);

            return $this->redirectToRoute('app_article_show', ['id' => $article->getId()], Response::HTTP_SEE_OTHER);
        }

        $allComments = $article->getComments();

        $formArticleDone = $this->createForm(ArticleDoneType::class);
        $formArticleDone->handleRequest($request);

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'formComent' => $formComment,
            'formArticleDone' => $formArticleDone,
            'comments' => $allComments,
            'course_completed' => $courseCompleted
        ]);
    }

    #[Route('/{id}/complete', name: 'mark_course_completed', methods: ['GET', 'POST'])]
    public function markCompleted(Article $article, Request $request, EntityManagerInterface $em)
    {
        $user = $this->getUser();

        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY') && $request->attributes->get('_route') !== 'login') {
            return $this->redirectToRoute('app_login_route');
        }

        $completedCourse = new UserCompletedCourse();
        $completedCourse->setUser($user);
        $completedCourse->setArticle($article);
        $completedCourse->setCompletedAt(new DateTimeImmutable());

        $em->persist($completedCourse);
        $em->flush();

        $this->addFlash('success', 'Cours marqué comme complété !');

        return $this->redirectToRoute('app_article_show', ['id' => $article->getId()], Response::HTTP_SEE_OTHER);
    }
}