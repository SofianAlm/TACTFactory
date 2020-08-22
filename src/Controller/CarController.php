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
     * @Route("/voitures/create", name="create_car.index")
     * @param ValidatorInterface $validator
     * @return Response
     */
    public function createCar(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $car = new Car();
        $car->setName('Nom de la voiture');
        $car->setColor('#808080');
        $car->setWidth(100, 00);
        $car->setHeight(100, 00);
        $car->setNbSeat(5);

        $errors = $validator->validate($car);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        $entityManager->persist($car);

        $entityManager->flush();

        return $this->render('voitures/create/index.html.twig');

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
