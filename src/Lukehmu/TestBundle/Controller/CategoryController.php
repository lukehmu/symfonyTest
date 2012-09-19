<?php

namespace Lukehmu\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lukehmu\TestBundle\Entity\Category;

class CategoryController extends Controller
{
	public function allCategoriesAction()
	{
		$em = $this->getDoctrine()->getManager();
		$categories = $em
						->getRepository('LukehmuTestBundle:Category')
						->findAll();
		if (!$categories)
		{
			throw $this->createNotFoundException('No note found for id '.$noteID);
		}
		return $this->render('LukehmuTestBundle:Category:category.html.twig',array(
				'categories' => $categories,
				));
	}
	
	public function catAction($catID)
	{
		$category = $this->getDoctrine()
		->getRepository('LukehmuTestBundle:Category')
		->find($catID);
		$notes = $category->getNotes();
		if (!$notes)
		{
			throw $this->createNotFoundException('No note found for id '.$noteID);
		}
		return $this->render('LukehmuTestBundle:Category:notesbycat.html.twig',array(
				'notes' => $notes,
					));
	}
}