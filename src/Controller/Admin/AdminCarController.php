<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;
use App\Form\CarType;

class AdminCarController extends AbstractController {

    /**
     * AdminCarController constructor.
     * @param CarRepository $repository
     * @param EntityManagerInterface $entityManager
     */
    private $repository;
    private $entityManager;

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
     * @Route("admin/voitures/create", name="admin.car.new")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function new(Request $request, EntityManagerInterface $entityManager){
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($car);
            $entityManager->flush();
            return $this->redirectToRoute('cars.index');
        }

        return $this->render("admin/car/new.html.twig", [
            'car' => $car,
            'form'=> $form->createView()
        ]);

    }

}