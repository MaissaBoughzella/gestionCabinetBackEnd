<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Imageradio
 * @ApiResource()
 * @ORM\Table(name="imageradio", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_ImageRadio_Consultation1_idx", columns={"Consultation_id"}), @ORM\Index(name="fk_ImageRadio_TypeRadio1_idx", columns={"TypeRadio_id"})})
 * @ORM\Entity
 */
class Imageradio
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
     * @var \Typeradio
     *
     * @ORM\ManyToOne(targetEntity="Typeradio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TypeRadio_id", referencedColumnName="id")
     * })
     */
    private $typeradio;

    /**
     * @var \Consultation
     *
     * @ORM\ManyToOne(targetEntity="Consultation")
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

    public function getTyperadio(): ?Typeradio
    {
        return $this->typeradio;
    }

    public function setTyperadio(?Typeradio $typeradio): self
    {
        $this->typeradio = $typeradio;

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
