<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 * @ApiResource()
 * @ORM\Table(name="consultation")
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
    * @ORM\OneToOne(targetEntity="App\Entity\Rdv",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="rdv_id", referencedColumnName="id",onDelete="CASCADE")
     * })
    */
    protected $rdv;


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

    public function __toString() 
    {
        return (string) $this->id; 
    }

    public function getRdv(): ?Rdv
    {
        return $this->rdv;
    }

    public function setRdv(?Rdv $rdv): self
    {
        $this->rdv = $rdv;

        return $this;
    }
    
}
