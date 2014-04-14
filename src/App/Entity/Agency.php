<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity
 */
class Agency
{
    /**
     *
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;
    /**
     *
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;
    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @var Country
     */
    protected $country;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Constructor.
     */
    public function __construct()
    {
        if (is_null($this->createdAt)) {
            $this->createdAt = new \DateTime();
        }
        $this->updatedAt = new \DateTime();
    }

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
     * @return Agency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     *
     * @return the datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     *
     * @param
     *            $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     *
     * @return the datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     *
     * @param $updatedAt
     * @return Agency
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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
