<?php
namespace Lukehmu\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Lukehmu\TestBundle\Repository\NotesRepository")
 * @ORM\Table(name="notes")
 */
class Notes
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="notes")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $noteSubject;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $noteBody;

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
     * Set noteSubject
     *
     * @param string $noteSubject
     * @return Notes
     */
    public function setNoteSubject($noteSubject)
    {
        $this->noteSubject = $noteSubject;
    
        return $this;
    }

    /**
     * Get noteSubject
     *
     * @return string 
     */
    public function getNoteSubject()
    {
        return $this->noteSubject;
    }

    /**
     * Set noteBody
     *
     * @param string $noteBody
     * @return Notes
     */
    public function setNoteBody($noteBody)
    {
        $this->noteBody = $noteBody;
    
        return $this;
    }

    /**
     * Get noteBody
     *
     * @return string 
     */
    public function getNoteBody()
    {
        return $this->noteBody;
    }

    /**
     * Set category
     *
     * @param Lukehmu\TestBundle\Entity\Category $category
     * @return Notes
     */
    public function setCategory(\Lukehmu\TestBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return Lukehmu\TestBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}