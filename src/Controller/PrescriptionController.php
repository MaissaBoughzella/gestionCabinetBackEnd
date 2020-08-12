<?php

namespace App\Controller;
use App\Entity\Prescription;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PrescriptionController
{
    
    protected $em; 
    public $pres ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->pres=new Prescription();
    }
   
    
    public function class(Request $req)
    {
        $ord = $req->attributes->get('ord');
        $this->pres = $this->em->getRepository(Prescription :: class)
        ->findByOrd($ord);
        return $this->pres;
    }

}