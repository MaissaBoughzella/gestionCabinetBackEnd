<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 * @ApiResource()
 * @ORM\Table(name="consultation", indexes={@ORM\Index(name="fk_Consultation_Ordonnance1_idx", columns={"id_ordonnance"})})
 * @ORM\Entity
 */
class Consultation
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
     * @var int|null
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var \Ordonnance
     *
     * @ORM\ManyToOne(targetEntity="Ordonnance",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ordonnance", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $idOrdonnance;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdOrdonnance(): ?Ordonnance
    {
        return $this->idOrdonnance;
    }

    public function setIdOrdonnance(?Ordonnance $idOrdonnance): self
    {
        $this->idOrdonnance = $idOrdonnance;

        return $this;
    }

    public function __toString() 
    {
        return (string) $this->id; 
    }
    
}
