<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\UserHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserHistoryController extends AbstractController
{
    private $security;
    private $em;    
    
    public function __construct(EntityManagerInterface $em,Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }
    public function addUserHistory(Request $request, EntityManagerInterface $entityManager, Article $article, User $user)
    {

        $userHistoryRepo = $entityManager->getRepository(UserHistory::class);
        $history = $userHistoryRepo->findOneBy(['user' => $user, 'article' => $article]);

        if (!$history) {
            $history = new UserHistory();
            $history->setUser($user);
            $history->setArticle($article);
        }

        $history->setLastVisited(new \DateTimeImmutable());

        $userHistoryRepo->save($history, true);

        return $this->redirectToRoute('app_article_show', ['id' => $article->getId()], Response::HTTP_SEE_OTHER);
    }
}