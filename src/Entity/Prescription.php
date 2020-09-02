<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Prescription
 * @ApiResource(
 *      collectionOperations={
 *      "get"={},
 *      "post"={},
 *      "get_by_ord"={
 *          "method"="GET",
 *          "path"="/prescriptions/getByOrdId/{ord}",
 *          "controller"="App\Controller\PrescriptionController::class"
 *      },
 *   },
 * )
 * @ORM\Table(name="prescription", uniqueConstraints={@ORM\UniqueConstraint(name="ord_med_unique", columns={"ordonnance_id", "medicament_id"})}, indexes={@ORM\Index(name="IDX_1FBFB8D92BF23B8F", columns={"ordonnance_id"}), @ORM\Index(name="IDX_1FBFB8D9AB0D61F7", columns={"medicament_id"})})
 *  @ORM\Entity(repositoryClass="App\Repository\PrescriptionRepository")
 */
class Prescription
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
     * @ORM\Column(name="dosage", type="string", length=255, nullable=true)
     */
    private $dosage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="forme", type="string", length=255, nullable=true)
     */
    private $forme;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantité", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var \Ordonnance
     * @ORM\ManyToOne(targetEntity="Ordonnance")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="ordonnance_id", referencedColumnName="id")
     * })
     */
    private $ordonnance;

    /**
     * @var \Medicament
     *
     * @ORM\ManyToOne(targetEntity="Medicament",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medicament_id", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $medicament;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(?string $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->forme;
    }

    public function setForme(?string $forme): self
    {
        $this->forme = $forme;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getOrdonnance(): ?Ordonnance
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(?Ordonnance $ordonnance): self
    {
        $this->ordonnance = $ordonnance;

        return $this;
    }

    public function getMedicament(): ?Medicament
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicament $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }


}
