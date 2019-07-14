<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/{_locale}",
 *     defaults={
 *         "_locale": "%locale%",
 *         "_format": "html"
 *     },
 *     requirements={
 *         "_locale": "%app.locales%",
 *         "_format": "html|xml"
 *     },
 *     schemes={"https"}
 * )
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('default/home.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/start", name="start")
     */
    public function start()
    {
        return $this->render('default/start.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq()
    {
        return $this->render('default/faq.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('default/about.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
