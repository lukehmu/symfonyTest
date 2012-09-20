<?php

namespace Lukehmu\TestBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\UserBundle\Model\UserInterface;
use Lukehmu\TestBundle\Entity\User;


class UserController extends Controller 
{ 
  public function newAction() 
  { 

   $userManager = $this->container->get('fos_user.user_manager'); 
   //$userA = new User();
   $userA = $userManager->createUser();
   $userA->setEmail('lukehmu@gmiaail.com');
   $userA->setUsername('mua');
   $userA->setPlainPassword('123'); 
   $userA->setEnabled(true);
   $userManager->updateUser($userA);
   
   $users = $userManager->findUsers(); 
   //var_dump($users); 
    return $this->render('LukehmuTestBundle:User:index.html.twig',array('users'=>$users)); 
  } 
}  
?>