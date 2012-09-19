<?php

namespace Lukehmu\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lukehmu\TestBundle\Entity\Notes;
use Lukehmu\TestBundle\Entity\Category;
use Lukehmu\TestBundle\Form\NoteType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $notesRepo = $this->getDoctrine()
                ->getRepository('LukehmuTestBundle:Notes');
        $notes = $notesRepo->findAll();
        
        return $this->render('LukehmuTestBundle:Default:index.html.twig', array(
            'allNotes' => $notes
        ));
    }
    
    public function noteAction($noteID)
    {
        $note = $this->getDoctrine()
                 ->getRepository('LukehmuTestBundle:Notes')
                ->findOneByIdJoinedToCategory($noteID);
        $category = $note->getCategory();

        if (!$note)
        {
            throw $this->createNotFoundException('No note found for id '.$noteID);
        }
        
        return $this->render('LukehmuTestBundle:Default:note.html.twig', array(
            'note' => $note,
            'category' => $category
        ));
    }

    public function newAction(Request $request)
    {
        $category = new Category();
        $note = new Notes();
        $form = $this->createForm(new NoteType(), $note);
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
             if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($note);
                $em->flush();
                return $this->redirect($this->generateURL('LukehmuTestBundle_homepage',array('NewNoteAdded'=> 'Yes')
                        ));
            }
        }
  
        return $this->render('LukehmuTestBundle:Default:newNote.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function deleteAction($noteID)
    {
        $em = $this->getDoctrine()->getManager();
        $note = $em->getRepository('LukehmuTestBundle:Notes'
                )->find($noteID);
        if (!$note)
        {
            throw $this->createNotFoundException('No note found for id '.$noteID);
        }
        $em->remove($note);
        $em->flush();
        return $this->redirect($this->generateURL('LukehmuTestBundle_homepage'));
    }
    
    public function updateAction($noteID, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $note = $em->getRepository('LukehmuTestBundle:Notes'
                )->find($noteID);
        if (!$note)
        {
            throw $this->createNotFoundException('No note found for id '.$noteID);
        }
        $form = $this->createForm(new NoteType(), $note);
        
         if($request->getMethod() == 'POST')
         {
            $form->bind($request);
             if ($form->isValid())
            {
                 $em->persist($note);
                 $em->flush();
                return $this->redirect($this->generateURL('LukehmuTestBundle_homepage',array('NewNoteUpdated'=> 'Yes')
                        ));
            }
        }
        
        return $this->render('LukehmuTestBundle:Default:updateNote.html.twig', array(
            'form' => $form->createView(), 'note' => $note
        ));
    }
}
