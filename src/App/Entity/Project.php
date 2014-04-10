<?php
namespace App\Entity;

use Avocode\FormExtensionsBundle\Form\Model\UploadCollectionFileInterface as FileInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="App\Entity\ProjectRepository")
 * @Vich\Uploadable
 *
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class Project implements FileInterface
{

    /**
     *
     * @var datetime @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;
    /**
     *
     * @var datetime @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;
    /**
     *
     * @var datetime @ORM\Column(name="begin_at", type="datetime")
     */
    protected $beginAt;
    /**
     *
     * @var float @ORM\Column(name="sell_price", type="float", nullable=true)
     */
    protected $sellPrice;
    /**
     *
     * @var float @ORM\Column(name="nb_days", type="float", nullable=true)
     */
    protected $nbDays;
    /**
     *
     * @var float @ORM\Column(name="tjm", type="float", nullable=true)
     */
    protected $tjm;
    /**
     * Etat d'activite du projet
     *
     * @var boolean @ORM\Column(name="is_active", type="boolean")
     */
    protected $active;
    /**
     * @ORM\ManyToMany(targetEntity="Technology", inversedBy="projects")
     * @ORM\JoinTable(name="project_technologies")
     *
     * @var ArrayCollection
     */
    protected $technologies;
    /**
     * @ORM\ManyToMany(targetEntity="Agency")
     * @ORM\JoinTable(name="project_agencies")
     *
     * @var ArrayCollection
     */
    protected $agencies;
    /**
     * @ORM\ManyToOne(targetEntity="Client")
     *
     * @var Client
     */
    protected $client;
    /**
     *
     * @var string
     * @ORM\Column(name="info_supp", type="text", nullable=true)
     */
    protected $infosupp;
    /**
     *
     * @var string
     * @ORM\Column(name="info_vol", type="text", nullable=true)
     */
    protected $infoVol;
    /**
     *
     * @var string
     * @ORM\Column(name="contract_type", type="string", length=255)
     */
    protected $contractType;
    /**
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(name="project_management")
     *
     * @var ArrayCollection
     */
    protected $projectManager;
    /**
     * Etat d'activite du projet
     *
     * @var boolean @ORM\Column(name="testimony", type="boolean")
     */
    protected $testimony;
    /**
     * Screen du projet
     *
     * @Assert\File(
     * maxSize="5M",
     * mimeTypes={"image/png", "image/jpg", "image/gif"}
     * )
     * @Vich\UploadableField(mapping="screenshot_mapping", fileNameProperty="screenshotLabel")
     *
     * @var File $screenshot
     */
    protected $screenshot;
    /**
     *
     * @var string $screenshotLabel
     *
     * @ORM\Column(name="screenshot_label", type="string", length=255, nullable=true)
     */
    protected $screenshotLabel;
    /**
     * @ORM\ManyToOne(targetEntity="Period", cascade={"all"})
     *
     * @var Period
     */
    protected $period;
    /**
     * Screen du projet
     *
     * @Assert\File(
     * maxSize="5M",
     * mimeTypes={"image/png", "image/jpg", "image/gif"}
     * )
     * @Vich\UploadableField(mapping="file_mapping", fileNameProperty="fileLabel")
     *
     * @var File $file
     */
    protected $file;
    /**
     *
     * @var string $fileLabel
     *
     * @ORM\Column(name="file_label", type="string", length=255, nullable=true)
     */
    protected $fileLabel;
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
     *
     * @var string @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

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
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getTechnologies()
    {
        return $this->technologies;
    }

    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;
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
     * @param $createdAt
     * @return Project
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
     * @return Project
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     *
     * @return the ArrayCollection
     */
    public function getAgencies()
    {
        return $this->agencies;
    }

    /**
     *
     * @param $agencies
     * @return $this
     */
    public function setAgencies($agencies)
    {
        $this->agencies = $agencies;
        return $this;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @return the datetime
     */
    public function getBeginAt()
    {
        return $this->beginAt;
    }

    /**
     *
     * @param datetime $beginAt
     * @return Project
     */
    public function setBeginAt($beginAt)
    {
        $this->beginAt = $beginAt;
        return $this;
    }

    /**
     *
     * @return the float
     */
    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    /**
     *
     * @param $sellPrice
     * @return Project
     */
    public function setSellPrice($sellPrice)
    {
        $this->sellPrice = $sellPrice;
        return $this;
    }

    /**
     *
     * @return the float
     */
    public function getNbDays()
    {
        return $this->nbDays;
    }

    /**
     *
     * @param $nbDays
     * @return Project
     */
    public function setNbDays($nbDays)
    {
        $this->nbDays = $nbDays;
        return $this;
    }

    /**
     *
     * @return the float
     */
    public function getTjm()
    {
        return $this->tjm;
    }

    /**
     *
     * @param $tjm
     * @return Project
     */
    public function setTjm($tjm)
    {
        $this->tjm = $tjm;
        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return 2048;
    }

    /**
     * @return bool
     */
    public function getPreview()
    {
        return true;
        // you could implement here some logic checking file's mimetype
        // to preview only Images
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    public function setFile(File $file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setParent($parent)
    {
        // note FileInterface has changed, now it simply requires a setParent method
        // which in my case simply calls setAlbum (because my parent is named "news")
        $this->setNews($parent);
    }

    /**
     *
     * @return string the File
     */
    public function getScreenshot()
    {
        return $this->screenshot;
    }

    /**
     *
     * @param $screenshot
     * @return Project
     */
    public function setScreenshot($screenshot)
    {
        $this->screenshot = $screenshot;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getScreenshotLabel()
    {
        return $this->screenshotLabel;
    }

    /**
     *
     * @param $screenshotLabel
     * @return Project
     */
    public function setScreenshotLabel($screenshotLabel)
    {
        $this->screenshotLabel = $screenshotLabel;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getInfosupp()
    {
        return $this->infosupp;
    }

    /**
     *
     * @param $infosupp
     * @return Project
     */
    public function setInfosupp($infosupp)
    {
        $this->infosupp = $infosupp;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getInfoVol()
    {
        return $this->infoVol;
    }

    /**
     *
     * @param $infoVol
     * @return Project
     */
    public function setInfoVol($infoVol)
    {
        $this->infoVol = $infoVol;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getContractType()
    {
        return $this->contractType;
    }

    /**
     *
     * @param $contractType
     * @return Project
     */
    public function setContractType($contractType)
    {
        $this->contractType = $contractType;
        return $this;
    }

    /**
     *
     * @return the ArrayCollection
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }

    /**
     *
     * @param Person $projectManager
     * @return Project
     */
    public function setProjectManager(Person $projectManager)
    {
        $this->projectManager = $projectManager;
        return $this;
    }

    /**
     *
     * @return bool the boolean
     */
    public function getTestimony()
    {
        return $this->testimony;
    }

    /**
     *
     * @param string $testimony
     * @return Project
     */
    public function setTestimony($testimony)
    {
        $this->testimony = $testimony;
        return $this;
    }


    /**
     * @return Period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param $period
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '';
    }

}
