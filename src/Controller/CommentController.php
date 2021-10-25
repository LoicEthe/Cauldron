<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
     */
    public function commentVote($id, $direction, LoggerInterface $logger )
    {
        if($direction === 'up'){
            $logger->info('Voting up!');
            $currentVote = rand(7,100);
        } else {
            $logger->info('Voting down!');
            $currentVote = rand(0,5);
        }

        return $this->json(['votes' => $currentVote]);
    }
}