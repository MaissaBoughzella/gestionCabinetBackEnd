<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ordonnance
 * @ApiResource()
 * @ORM\Table(name="ordonnance")
 * @ORM\Entity
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

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="heure", type="time", nullable=true)
     */
    private $heure;

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
    * @ORM\OneToOne(targetEntity="App\Entity\Consultation",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="consultation_id", referencedColumnName="id",onDelete="CASCADE")
     * })
    */
    protected $consultation;

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }
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
