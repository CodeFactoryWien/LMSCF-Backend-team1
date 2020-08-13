<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use  Symfony\Component\HttpFoundation\Request;

class LaGombaController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('la_gomba/index.html.twig');
    }

    /**
     * @Route("/nora", name="nora")
     */
    public function nora()
    {
        return $this->render('la_gomba/nora.html.twig');
    }

    /**
     * @Route("/products", name="products")
     */
    public function products()
    {
        return $this->render('la_gomba/product.html.twig');
    }

    /**
     * @Route("/recipes", name="recipes")
     */
    public function recipes()
    {
        return $this->render('la_gomba/recipes.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('la_gomba/contact.html.twig');
    }
}
