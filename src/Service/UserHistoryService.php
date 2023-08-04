<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\UserHistory;
use Doctrine\ORM\EntityManagerInterface;

class UserHistoryService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function addToHistory(User $user, Article $article, string $timezone): void
    {
        // Check if there is already a record for this article and user
        $userHistory = $this->em->getRepository(UserHistory::class)->findOneBy(['user' => $user, 'article' => $article]);

        if (!$userHistory) {
            // If not, create a new one
            $userHistory = new UserHistory();
            $userHistory->setUser($user);
            $userHistory->setArticle($article);
            $userHistory->setLastVisited(new \DateTime('now', new \DateTimeZone($timezone)));
        } else {
            // If it exists, just update the lastVisited time
            $userHistory->setLastVisited(new \DateTime('now', new \DateTimeZone($timezone)));
        }

        $this->em->persist($userHistory);
        $this->em->flush();
    }
}