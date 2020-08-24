<?php

namespace App\Controller;
use App\Entity\Imageradio;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class RadioController
{
    
    protected $em; 
    public $Imageradio ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->Imageradio=new Imageradio();
    }
   
    
    public function class(Request $req)
    {
        $cons = $req->attributes->get('cons_id');
        $this->Imageradio = $this->em->getRepository(Imageradio :: class)
        ->findByCons($cons);
        return $this->Imageradio;
    }

}