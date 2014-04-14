<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="Person")
 * @ORM\Entity
 */
class Person
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     *
     * @var string @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     *
     * @var \DateTime @ORM\Column(name="birthdate", type="datetime")
     */
    private $birthdate;

    /**
     *
     * @var \DateTime @ORM\Column(name="arrival", type="datetime")
     */
    private $arrival;

    /**
     *
     * @var \DateTime @ORM\Column(name="departure", type="datetime")
     */
    private $departure;

    /**
     *
     * @var string @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     *
     * @var string @ORM\Column(name="picture_name", type="string", length=255, nullable=true)
     */
    private $photoName;

    /**
     *
     * @var array @ORM\ManyToMany(targetEntity="Technology")
     * @ORM\JoinTable(name="competences")
     */
    private $technologies;

    /**
     *
     * @var string @ORM\ManyToOne(targetEntity="BusinessUnit")
     */
    private $bu;

    /**
     *
     * @var array @ORM\ManyToMany(targetEntity="Project")
     * @ORM\JoinTable(name="project_team")
     */
    private $projects;

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
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Person
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Person
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get technologies
     *
     * @return array
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * Set technologies
     *
     * @param array $technologies
     * @return Person
     */
    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }

    /**
     * Get bu
     *
     * @return string
     */
    public function getBu()
    {
        return $this->bu;
    }

    /**
     * Set bu
     *
     * @param string $bu
     * @return Person
     */
    public function setBu($bu)
    {
        $this->bu = $bu;

        return $this;
    }

    /**
     * Get projects
     *
     * @return array
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set projects
     *
     * @param array $projects
     * @return Person
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     *
     * @return the DateTime
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     *
     * @param
     *            $arrival
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     *
     * @return the DateTime
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     *
     * @param $departure
     * @return Person
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    public function getPhotoName()
    {
        return $this->photoName;
    }

    /**
     * @param $photoName
     * @return $this
     */
    public function setPhotoName($photoName)
    {
        $this->photoName = $photoName;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
}
