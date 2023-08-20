<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class BaseController extends AbstractController
{
    protected $security;
    protected $em;

    public function __construct(EntityManagerInterface $em,Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }

    protected function checkAccessControl(Request $request)
    {
        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY') && $request->attributes->get('_route') !== 'login') {
            return $this->redirectToRoute('app_login_route');
        }
    }
}
