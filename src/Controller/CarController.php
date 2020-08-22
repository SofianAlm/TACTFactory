<?php

namespace App\Controller;


use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;

class CarController extends AbstractController {

    /**
     * @var $repository
     */
    private $repository;
    private $entityManager;

    public function __construct(CarRepository $repository, EntityManagerInterface $entityManager){
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/voitures", name="cars.index")
     * @param CarRepository $repository
     * @return Response
     */

     public function index(CarRepository $repository): Response{

         $cars = $repository->findAll();
        return $this->render('voitures/index.html.twig', [
            'cars' => $cars
        ]);

    }

}
