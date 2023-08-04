<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_category_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/get-user-timezone', name: 'app_login_get_timezone', methods: ['POST'])]
    public function getTimezoneFromClient(Request $request): JsonResponse
    {
        if (empty($request->cookies->get('user_timezone'))) {
            $content = $request->getContent();
            if (!empty($content)) {
                $data = json_decode($content, true);
                $timezone = $data['timezone'];
                $timezoneObject = new \DateTimeZone($timezone);
                $expiry = new \DateTime('now', $timezoneObject);
                $expiry->modify('+15 minutes');
            }

            $response = new JsonResponse("TIMEZONE'S SET");
            $response->headers->setCookie(Cookie::create('user_timezone', $timezone, $expiry));
            return $response;
        }

        $response = new JsonResponse("TIMEZONE ALREADY EXISTS");
        return $response;
    }

}