<?php

namespace App\Controller;

use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RoleController extends AbstractController

{

    protected $em; 
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }
   
    
    public function class()
    {
      return  $this->em->getRepository(Role::class)->findAll();
    }
}
