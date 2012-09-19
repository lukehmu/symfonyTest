<?php

namespace Lukehmu\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
	public function newAction()
	{
		echo('blah');
		$userManager = $container->get('fos_user.user_manager');
		$user = $userManager->createUser();
		$user->setUsername('aa');
		echo('blah');
		$userManager->updateUser($user);
		//return new Response($un);
	}

}
?>