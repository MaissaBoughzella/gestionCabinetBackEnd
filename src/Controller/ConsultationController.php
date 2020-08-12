<?php

namespace App\Controller;
use App\Entity\Consultation;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ConsultationController
{
    
    protected $em; 
    public $cons ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->cons=new Consultation();
    }
   
    
    public function class(Request $req) : Consultation
    {
        $rdv_id = $req->attributes->get('rdv_id');
        $this->cons = $this->em->getRepository(Consultation :: class)
        ->findOneByConsId($rdv_id);
        return $this->cons;   
    }
    

}
