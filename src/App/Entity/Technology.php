<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Technology
 *
 * @ORM\Table(name="technology")
 * @ORM\Entity(repositoryClass="App\Entity\TechnologyRepository")
 */
class Technology
{

    /**
     * type of this technology
     *
     * @var array $tags
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
     *
     * @var integer @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *
     * @var string @ORM\Column(name="name", type="string", length=255)
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Array $tags
     * @return Technology
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
