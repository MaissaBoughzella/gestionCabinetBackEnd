<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 * @ApiResource()
 * @ORM\Table(name="rdv", uniqueConstraints={@ORM\UniqueConstraint(name="patient_med_unique", columns={"Patient_id", "Medecin_id"})}, indexes={@ORM\Index(name="IDX_10C31F864F31A84", columns={"Medecin_id"}), @ORM\Index(name="IDX_10C31F866B899279", columns={"Patient_id"})})
 * @ORM\Entity
 */
class Rdv
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

    /**
     * @var int
     *
     * @ORM\Column(name="id_consultation", type="integer", nullable=false)
     */
    private $idConsultation;

    /**
     * @var \Medecin
     *
     * @ORM\ManyToOne(targetEntity="Medecin",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Medecin_id", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $medecin;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient",cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Patient_id", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $patient;

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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getIdConsultation(): ?int
    {
        return $this->idConsultation;
    }

    public function setIdConsultation(int $idConsultation): self
    {
        $this->idConsultation = $idConsultation;

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }


}
