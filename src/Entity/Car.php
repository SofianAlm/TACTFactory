<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min=1,
     *     max=9,
     *     notInRangeMessage = "Vous devez avoir au moins {{ min }} place, et {{ max }} au maximum",
     *     )
     */
    private $nbSeat;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern = "/^#[a-f0-9]{6}$/")
     */
    private $color;

    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="float")
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parking_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbSeat(): ?int
    {
        return $this->nbSeat;
    }

    public function setNbSeat(int $nbSeat): self
    {
        $this->nbSeat = $nbSeat;

        return $this;
    }


    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getParkingId(): ?int
    {
        return $this->parking_id;
    }

    public function setParkingId(?int $parking_id): self
    {
        $this->parking_id = $parking_id;

        return $this;
    }
}
