<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Entity\UserHistory;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('', name: 'app_profile_show', methods: ['GET'])]
    public function show(): Response
    {

        return $this->render('profile/show.html.twig', [
            'user' => $this->getUser(),
            'userHistory' => $this->showUserHistory($this->getUser())
        ]);
    }

    public function showUserHistory(User $user)
    {
        return $this->em->getRepository(UserHistory::class)->findBy(['user' => $user], ['lastVisited' =>'DESC']);
    }

    #[Route('/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(User1Type::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $this->getUser()->setPassword($passwordHasher->hashPassword($this->getUser(), $plainPassword));
            $userRepository->save($this->getUser(), true);

            return $this->redirectToRoute('app_profile_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profile/edit.html.twig', [
            'user' => $this->getUser(),
            'form' => $form,
        ]);
    }

    #[Route('/', name: 'app_profile_delete', methods: ['POST'])]
    public function delete(Request $request, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $this->getUser()->getId(), $request->request->get('_token'))) {
            $userRepository->remove($this->getUser(), true);
        }

        return $this->redirectToRoute('app_profile_show', [], Response::HTTP_SEE_OTHER);
    }
}