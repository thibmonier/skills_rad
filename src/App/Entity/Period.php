<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Period
 *
 * @ORM\Table(name="period")
 * @ORM\Entity
 */
class Period
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
    private $sDate;

    /**
     *
     * @var string @ORM\Column(name="month_label", type="string", length=255)
     */
    private $monthLabel;

    /**
     *
     * @var integer @ORM\Column(name="month", type="integer")
     */
    private $month;

    /**
     *
     * @var string @ORM\Column(name="year_label", type="string", length=255)
     */
    private $yearLabel;

    /**
     *
     * @var integer @ORM\Column(name="year", type="integer")
     */
    private $year;


    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $date = new \DateTime();
        $this->month = date("m");
        $this->year = date("Y");
        
        $this->monthLabel = date("m");
        $this->yearLabel = date("Y");
        
        $this->sDate = $this->monthLabel . '-' . $this->yearLabel;
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
     * Set monthLabel
     *
     * @param string $monthLabel            
     * @return Period
     */
    public function setMonthLabel($monthLabel)
    {
        $this->monthLabel = $monthLabel;
        
        return $this;
    }

    /**
     * Get monthLabel
     *
     * @return string
     */
    public function getMonthLabel()
    {
        return $this->monthLabel;
    }

    /**
     * Set month
     *
     * @param integer $month            
     * @return Period
     */
    public function setMonth($month)
    {
        $this->month = $month;
        
        return $this;
    }

    /**
     * Get month
     *
     * @return integer
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set yearName
     *
     * @param string $yearName            
     * @return Period
     */
    public function setYearName($yearName)
    {
        $this->yearName = $yearName;
        
        return $this;
    }

    /**
     * Get yearName
     *
     * @return string
     */
    public function getYearName()
    {
        return $this->yearName;
    }

    /**
     * Set year
     *
     * @param integer $year            
     * @return Period
     */
    public function setYear($year)
    {
        $this->year = $year;
        
        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    public function getProjects()
    {
        return $this->projects;
    }

    public function setProjects($projects)
    {
        $this->projects = $projects;
        return $this;
    }
}
