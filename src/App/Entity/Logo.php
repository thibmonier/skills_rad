<?php
namespace App\Entity;

use Avocode\FormExtensionsBundle\Form\Model\UploadCollectionFileInterface;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="acme_image")
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 * @Vich\Uploadable
 */
class Logo implements UploadCollectionFileInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name; // used for nameable option
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $description; // simple editable field
    
    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="path")
     */
    protected $file; // file container
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path; // used to store file path
    
    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    protected $position; // used to store sortable position
    
    /**
     * Set file
     *
     * @param Symfony\Component\HttpFoundation\File\File $file            
     * @return AlbumImage
     */
    public function setFile(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->file->getFileInfo()->getSize();
    }

    /**
     * @inheritDoc
     */
    public function setParent($parent)
    {
        $this->setAlbum($parent);
    }

    /**
     * @inheritDoc
     */
    public function getPreview()
    {
        return (preg_match('/image\/.*/i', $this->getMimeType()));
    }

    /**
     *
     * @return the unknown_type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param unknown_type $name            
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param unknown_type $description            
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     *
     * @param unknown_type $path            
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     *
     * @param unknown_type $position            
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
}