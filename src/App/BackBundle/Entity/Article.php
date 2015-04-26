<?php

namespace App\BackBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var \DateTime
     */
    private $datePub;

    /**
     * @var string
     */
    private $image;

    /**
     * @var boolean
     */
    private $statut;

    /**
     * @var string
     */
    private $auteur;


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
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set datePub
     *
     * @param \DateTime $datePub
     * @return Article
     */
    public function setDatePub($datePub)
    {
        $this->datePub = $datePub;

        return $this;
    }

    /**
     * Get datePub
     *
     * @return \DateTime 
     */
    public function getDatePub()
    {
        return $this->datePub;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Article
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Article
     */
    public function setstatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getstatut()
    {
        return $this->statut;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    /**
     * Get web path to upload directory.
     *
     * @return string
     *   Relative path.
     */
    protected function getUploadPath()
    {
        return 'uploads/images';
    }

    /**
     * Get absolute path to upload directory.
     *
     * @return string
     *   Absolute path.
     */
    protected function getUploadAbsolutePath()
    {
        return __DIR__ . '/../../../../web/' . $this->getUploadPath();
    }

    /**
     * Get web path to a cover.
     *
     * @return null|string
     *   Relative path.
     */
    public function getImageWeb() {
        return NULL === $this->getImage()
            ? NULL
            : $this->getUploadPath() . '/' . $this->getImage();
    }

    /**
     * Get path on disk to a cover.
     *
     * @return null|string
     *   Absolute path.
     */
    public function getCoverAbsolute() {
        return NULL === $this->getImage()
            ? NULL
            : $this->getUploadAbsolutePath() . '/' . $this->getImage();
    }

    /**
     * @Assert\File(maxSize="1000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setFile(UploadedFile $file = NULL) {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Upload a cover file.
     */
    public function upload() {
        // File property can be empty.
        if (NULL === $this->getFile()) {
            return;
        }

        $filename = $this->getFile()->getClientOriginalName();

        // Move the uploaded file to target directory using original name.
        $this->getFile()->move(
            $this->getUploadAbsolutePath(),
            $filename);

        // Set the cover.
        $this->setImage($filename);

        // Cleanup.
        $this->setFile();
    }
}
