<?php

namespace App\Controller;

// use DateTimeImmutable;
// use App\Entity\Comment;
// use App\Form\Comment1Type;
// use App\Repository\CommentRepository;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// #[Route('/comment')]
class CommentController extends AbstractController
{

//     #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
//     public function new(Request $request, CommentRepository $commentRepository): Response
//     {
//         $comment = new Comment();
//         $comment->setCreatedAt(new DateTimeImmutable);
//         $comment->setUser($this->getUser());
        
//         $form = $this->createForm(Comment1Type::class, $comment);
//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $commentRepository->save($comment, true);

//             return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
//         }

//         return $this->renderForm('comment/new.html.twig', [
//             'comment' => $comment,
//             'form' => $form,
//         ]);
//     }

//     #[Route('/{id}/edit', name: 'app_comment_edit', methods: ['GET', 'POST'])]
//     public function edit(Request $request, Comment $comment, CommentRepository $commentRepository): Response
//     {
//         $form = $this->createForm(Comment1Type::class, $comment);
//         $form->handleRequest($request);
//         $comment->setUpdatedAt(new DateTimeImmutable);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $commentRepository->save($comment, true);

//             return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
//         }

//         return $this->renderForm('comment/edit.html.twig', [
//             'comment' => $comment,
//             'form' => $form,
//         ]);
//     }

//     #[Route('/{id}', name: 'app_comment_delete', methods: ['POST'])]
//     public function delete(Request $request, Comment $comment, CommentRepository $commentRepository): Response
//     {
//         if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
//             $commentRepository->remove($comment, true);
//         }

//         return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
//     }
}
