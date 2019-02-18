<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostRequestType;
use App\Repository\PostRepository;
use Doctrine\Bundle\DoctrineCacheBundle\DependencyInjection\Definition\RedisDefinition;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/post/{id}/edit", name="edit_post")
     */
    public function editPost(Post $post, Request $request, EntityManagerInterface $entityManager)
    {
        $form= $this->createForm(PostRequestType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('post_item', ['id'=> $post->getId()]);
        }
        return $this->render('erditPost/erditPost.html.twig'
            , ['form'=>$form->createView(),
        'post'=>$post,]);
    }
}

