<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAllController extends AbstractController
{
    #[Route('/admin/all', name: 'app_admin_all')]
    public function index(): Response
    {
        return $this->render('admin/admin_all/index.html.twig', [
            'controller_name' => 'AdminAllController',
        ]);
    }
}
