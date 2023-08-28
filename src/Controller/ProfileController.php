<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Entity\UserHistory;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    private $security;
    private $em;

    public function __construct(EntityManagerInterface $em, Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }

    #[Route('', name: 'app_profile_show', methods: ['GET'])]
    public function show(): Response
    {

        return $this->render('profile/show.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher): Response
    {
        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY') && $request->attributes->get('_route') !== 'login') {
            return $this->redirectToRoute('app_login_route');
        }
        $userHistory = $this->em->getRepository(UserHistory::class)->findBy(['user' => $this->getUser()], ['lastVisited' => 'DESC']);
        $userCompletedCourse = $this->getUser()->getUserCompletedCourses();


        $form = $this->createForm(User1Type::class, $this->getUser(), ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('change_password')->getData() && !empty($form->get('plainPassword')->getData())) {
                $plainPassword = $form->get('plainPassword')->getData();
                $this->getUser()->setPassword($passwordHasher->hashPassword($this->getUser(), $plainPassword));
            }

            $userRepository->save($this->getUser(), true);

            return $this->redirectToRoute('app_profile_edit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profile/edit.html.twig', [
            'user' => $this->getUser(),
            'form' => $form,
            'userHistory' => $userHistory,
            'userCompletedCourse' => $userCompletedCourse
        ]);
    }

    #[Route('/', name: 'app_profile_delete', methods: ['POST'])]
    public function delete(Request $request, UserRepository $userRepository, SessionInterface $session,TokenStorageInterface $tokenStorage): Response
    {
        if ($this->isCsrfTokenValid('delete' . $this->getUser()->getId(), $request->request->get('_token'))) {
            $session->invalidate();
            $userRepository->remove($this->getUser(), true);
            $tokenStorage->setToken(null);
            
        }

        return $this->redirectToRoute('app_login_route');
    }
}