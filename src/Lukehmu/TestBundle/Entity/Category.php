<?php

namespace Lukehmu\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Lukehmu\TestBundle\Entity\Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
    /**
     * @ORM\OneToMany(targetEntity="Notes", mappedBy="category", cascade={"persist"})
     */
    protected $notes;
    
    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add notes
     *
     * @param Lukehmu\TestBundle\Entity\Notes $notes
     * @return Category
     */
    public function addNote(\Lukehmu\TestBundle\Entity\Notes $notes)
    {
        $this->notes[] = $notes;
    
        return $this;
    }

    /**
     * Remove notes
     *
     * @param Lukehmu\TestBundle\Entity\Notes $notes
     */
    public function removeNote(\Lukehmu\TestBundle\Entity\Notes $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}