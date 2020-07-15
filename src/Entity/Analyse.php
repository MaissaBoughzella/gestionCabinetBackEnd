<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Analyse
 *@ApiResource()
 * @ORM\Table(name="analyse", indexes={@ORM\Index(name="fk_Analyse_Consultation1_idx", columns={"Consultation_id"}), @ORM\Index(name="fk_Analyse_TypeAnalyse1_idx", columns={"TypeAnalyse_id"})})
 * @ORM\Entity
 */
class Analyse
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
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \Typeanalyse
     *
     * @ORM\ManyToOne(targetEntity="Typeanalyse",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypeAnalyse_id", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $typeanalyse;

    /**
     * @var \Consultation
     *
     * @ORM\ManyToOne(targetEntity="Consultation",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Consultation_id", referencedColumnName="id")
     * })
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeanalyse(): ?Typeanalyse
    {
        return $this->typeanalyse;
    }

    public function setTypeanalyse(?Typeanalyse $typeanalyse): self
    {
        $this->typeanalyse = $typeanalyse;

        return $this;
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
