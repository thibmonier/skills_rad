<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessUnit
 *
 * @ORM\Table(name="business_unit")
 * @ORM\Entity
 */
class BusinessUnit
{
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
     * @var Agency
     *
     * @ORM\ManyToOne(targetEntity="Agency")
     */
    private $agency;

    /**
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="Person")
     */
    private $manager;


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
     * Get agency
     *
     * @return Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set agency
     *
     * @param Agency $agency
     * @return BusinessUnit
     */
    public function setAgency(Agency $agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get manager
     *
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set manager
     *
     * @param string $manager
     * @return BusinessUnit
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
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
     * @return BusinessUnit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
