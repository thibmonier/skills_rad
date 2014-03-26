<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Technology
 *
 * @ORM\Table(name="technology")
 * @ORM\Entity(repositoryClass="App\Entity\TechnologyRepository")
 */
class Technology
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * type of this technology
     *
     * @var TechnologyType 
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag")
     * @ORM\JoinTable(name="technology_tag")
     */
    protected $tags = array();

    
    /**
     * projects using this technology
     *
     * @var ArrayCollection Projects
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="technologies", cascade={"all"})
     */
    protected $projects = array();
    
    
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
     * @return Technology
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
     * Get technologyType
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * TechnologyType
     * @param Array $technologyType
     * @return \App\Entity\Technology
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
