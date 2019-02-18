<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="postAdd")
     */
    public function index(Request $request )
    {
        $postRequest = new Post();
        $form = $this->createForm(PostRequestType::class, $postRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
            {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($postRequest);
                $manager->flush();

                return $this->redirectToRoute('postAdd');
            }
            return $this->render('post/index.html.twig', [
                'form' => $form->createView()
            ]);

        }

}
