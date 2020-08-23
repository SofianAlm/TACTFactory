<?php

namespace App\Controller;


use App\Entity\ParkingSpace;
use App\Repository\ParkingSpaceRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;

class ParkingSpaceController extends AbstractController {

    /**
     * @var $repository
     */
    private $repository;
    private $entityManager;

    public function __construct(ParkingSpaceRepository $repository, EntityManagerInterface $entityManager){
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/parkingspace", name="parkingspace.index")
     * @param ParkingSpaceRepository $repository
     * @return Response
     */

    public function index(ParkingSpaceRepository $repository): Response{

        $parkingSpaces = $repository->findAll();
        return $this->render('parkingSpace/index.html.twig', [
            'parkingSpaces' => $parkingSpaces
        ]);

    }

}