<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LuckyController extends AbstractController {

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function number() {
        // $number = random_int(0,100);

        // return new Response(
        //     '<html><body>Lucky number: '.$number.'<body><html>'
        // );

        $articles = ['Articles 1', ' Articles 2'];

        return $this->render('articles/index.html.twig',array('articles' => $articles));
    }
        /**
         * @Route("/article/save")
         */

         public function save(){
             $entityManager = $this -> getDoctrine() -> getManager();

             $article = new Article();

             $article -> setTitle('Article Two');
             $article -> setBody('This is body for article Two');

             $entityManager  ->persist($article);
         
             $entityManager  -> flush();

             return new Response('Save an article with id of'.$article ->getId());
       }
  
}
