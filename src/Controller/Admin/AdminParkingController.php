<?php

namespace App\Controller\Admin;

use App\Entity\Parking;
use App\Entity\ParkingSpace;
use App\Form\ParkingType;
use App\Form\ParkingSpaceType;
use App\Repository\ParkingRepository;
use App\Repository\ParkingSpaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;

class AdminParkingController extends AbstractController {

    /**
     * AdminParkingController constructor.
     * @param ParkingRepository $repository
     * @param ParkingSpaceRepository $repositorySpace
     */
    private $repository;
    private $repositorySpace;
    public function __construct(ParkingRepository $repository, ParkingSpaceRepository $repositorySpace) {
        $this->repository = $repository;


    }

    /**
     * @Route("/admin", name="admin.parking.index")
     * @return Response
     */

    public function index(){
        $parking = $this->repository->findAll();
        return $this->render('admin/parks/index.html.twig');
    }

    /**
     * @Route("admin/parks/create", name="admin.parking.new")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param EntityManagerInterface $entityManagerSpace
     * @return Response
     */

    public function new(Request $request, EntityManagerInterface $entityManager, EntityManagerInterface $entityManagerSpace){
        $parking = new Parking();
        $parkingSpace = new ParkingSpace();
        $form = $this->createForm(ParkingType::class, $parking);
        $form2 = $this->createForm(ParkingSpaceType::class, $parkingSpace);
        $form->handleRequest($request);
        $form2->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $form2->isSubmitted() && $form2->isValid()  ){
            $parkingSpace->setParkingId($parking->getId());
            $entityManager->persist($parking);
            $entityManagerSpace->persist($parkingSpace);
            $entityManager->flush();
            $entityManagerSpace->flush();
            return $this->redirectToRoute('parking.index');
        }

        return $this->render("admin/parks/new.html.twig", [
            'parking' => $parking,
            'form'=> $form->createView(),
            'form2'=> $form2->createView()
        ]);

    }
}