<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @var Environment
     */

    private $twig;

    public function __construct($twig){
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="home")
     * @param CarRepository $repository
     * @return Response
     */

    public function index(): Response {
        return $this->render('pages/home.html.twig');
    }
}