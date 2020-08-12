<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ordonnance
 * @ApiResource(
 *      collectionOperations={
 *      "get"={},
 *      "post"={},
 *      "get_by_cons"={
 *          "method"="GET",
 *          "path"="/ordonnances/getByConsId/{cons}",
 *          "controller"="App\Controller\OrdonnanceController::class"
 *      },
 *   },
 * )
 * @ORM\Table(name="ordonnance")
 * @ORM\Entity(repositoryClass="App\Repository\OrdonnanceRepository")
 */
class Ordonnance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
    * @ORM\OneToOne(targetEntity="App\Entity\Consultation")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="consultation_id", referencedColumnName="id")
     * })
    */
    protected $consultation;

    public function __toString() 
    {
        return (string) $this->id; 
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }
    

}
