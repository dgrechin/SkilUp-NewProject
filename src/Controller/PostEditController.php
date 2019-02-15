<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostEditController extends AbstractController
{
    /**
     * @Route("/post/{id}", name="post_item")
     */
    public function item(Post $post)
    {
        return $this->render('post_edit/index.html.twig', [
            'post' => $post,
        ]);


    }
}
