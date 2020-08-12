<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class UserByRoleController
{
    
    protected $em; 
    public $user ;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
        $this->user=new User();
    }
   
    
    public function class(Request $req)
    {
        $role = $req->attributes->get('role');
        $this->user = $this->em->getRepository(User :: class)
        ->findByRole($role);
        return $this->user;
    }
    

}
