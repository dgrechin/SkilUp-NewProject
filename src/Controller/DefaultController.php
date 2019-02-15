<?php

namespace App\Controller;


use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="posts")
     */
    public function post( PostRepository $postRepository)
    {

        $posts = $postRepository->findBy(['createdAt'] );

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
