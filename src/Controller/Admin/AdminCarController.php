<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;
use App\Form\CarType;

class AdminCarController extends AbstractController {

    /**
     * AdminCarController constructor.
     * @param CarRepository $repository
     */
    private $repository;

    public function __construct(CarRepository $repository){
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.car.index")
     * @return Response
     */
    public function index() {
        $cars = $this->repository->findAll();

        return $this->render('admin/car/index.html.twig', [
            'cars' => $cars
        ]);
    }

    /**
     * @Route("/admin", name="admin.car.create")
     * @param Car $car
     * @return Response
     */
    public function createCar(Car $car){

        $form = $this->createForm(CarType::class, $car);
        return $this->render('admin/car/create.html.twig', [
            'car'=> $car,
            'form' => $form->createView()
        ]);

    }

}