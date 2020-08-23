<?php

namespace App\Controller;


use App\Entity\Parking;
use App\Repository\ParkingRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;

class ParkingController extends AbstractController {

    /**
     * @var $repository
     */
    private $repository;
    private $entityManager;

    public function __construct(ParkingRepository $repository, EntityManagerInterface $entityManager){
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/parking", name="parking.index")
     * @param ParkingRepository $repository
     * @return Response
     */

    public function index(ParkingRepository $repository): Response{

        $parkings = $repository->findAll();
        return $this->render('parking/index.html.twig', [
            'parkings' => $parkings
        ]);

    }

}