<?php

namespace App\Controller;
use App\Entity\Patient;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PatientController
{
    
    protected $em; 
    public $patient ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->patient=new Patient();
    }
   
    
    public function class(Request $req) : Patient
    {
        $user_id = $req->attributes->get('user');
        $this->patient = $this->em->getRepository(Patient :: class)
        ->findOneByUserId($user_id);
        return $this->patient;   
    }
    

}
