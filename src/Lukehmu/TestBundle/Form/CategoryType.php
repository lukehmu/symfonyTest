<?php

namespace Lukehmu\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Lukehmu\TestBundle\Entity\Category;


class CategoryType extends AbstractType
{
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
    	$resolver->setDefaults(array(
        	'data_class' => 'Lukehmu\TestBundle\Entity\Category',
                'cascade_validation' => true,
    	));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }
    
    public function getName()
    {
        return 'category';
    }
}

?>