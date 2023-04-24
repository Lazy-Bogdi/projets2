<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\Article1Type;
use App\Repository\ArticleRepository;

use DateTimeImmutable;
use App\Entity\Comment;
use App\Form\Comment1Type;
use App\Repository\CommentRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/{id}', name: 'app_article_show', methods: ['GET', 'POST'])]
    public function show(Article $article, CommentRepository $commentRepository, Request $request): Response
    {
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

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'formComent' => $formComment,
            'comments' => $allComments,
        ]);
    }

}