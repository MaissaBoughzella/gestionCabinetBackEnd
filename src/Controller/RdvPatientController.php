<?php

namespace App\Controller;
use App\Entity\Rdv;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RdvPatientController
{
    
    protected $em; 
    public $rdv ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->rdv=new Rdv();
    }
   
    
    public function class(Request $req)
    {
        $patient = $req->attributes->get('patient');
        $this->rdv = $this->em->getRepository(Rdv :: class)
        ->findByPatient($patient);
        return $this->rdv;
    }

}