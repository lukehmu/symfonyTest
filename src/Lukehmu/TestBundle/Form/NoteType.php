<?php

namespace Lukehmu\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lukehmu\TestBundle\Entity\Category;


class NoteType extends AbstractType
{
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
    	$resolver->setDefaults(array(
        	'data_class' => 'Lukehmu\TestBundle\Entity\Notes',
    	));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('noteSubject');
        $builder->add('noteBody','textarea');
        $builder->add('category', 'entity', array(
           'class' => 'LukehmuTestBundle:Category',
           'property' => 'name',
           ));
    }
    
    public function getName()
    {
        return 'note';
    }
}

?>