<?php
namespace Salatino\EntityBundle\Entity;

use Salatino\EntityBundle\Entity\Component\EntityComponent;
use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity
 */
class Content extends EntityComponent
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Section", inversedBy="contents")
     * @ORM\JoinColumn(name="id_section", referencedColumnName="id", nullable=true)
     */
    private $section;

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", length=255, nullable=true)
     */
    private $template;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=true)
     */
    private $body;
    
    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=100, nullable=true)
     */
    private $picture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="big_picture", type="string", length=100, nullable=true)
     */
    private $bigPicture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="small_picture", type="string", length=100, nullable=true)
     */
    private $smallPicture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=100, nullable=true)
     */
    private $video;
    
    /**
     * @var string
     *
     * @ORM\Column(name="show_gallery", type="string", length=45, nullable=true)
     */
    private $showGallery;
    
    /**
     * @var string
     *
     * @ORM\Column(name="show_video", type="string", length=45, nullable=true)
     */
    private $showVideo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="folder", type="string", length=100, nullable=true)
     */
    private $folder;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=1000, nullable=true)
     */
    private $tags;
    
    /**
     * @@ORM\Column(type="integer", name="views" nullable=false, options={"unsigned":true, "default":0})
     */
    private $views;
    
    /**
     * @@ORM\Column(type="integer", name="ranking" nullable=false, options={"unsigned":true, "default":0})
     */
    private $ranking;


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
     * Set template
     *
     * @param string $template
     *
     * @return Content
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Content
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Content
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Content
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

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
     * Set smallPicture
     *
     * @param string $smallPicture
     *
     * @return Content
     */
    public function setSmallPicture($smallPicture)
    {
        $this->smallPicture = $smallPicture;

        return $this;
    }

    /**
     * Get smallPicture
     *
     * @return string
     */
    public function getSmallPicture()
    {
        return $this->smallPicture;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Content
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set showGallery
     *
     * @param string $showGallery
     *
     * @return Content
     */
    public function setShowGallery($showGallery)
    {
        $this->showGallery = $showGallery;

        return $this;
    }

    /**
     * Get showGallery
     *
     * @return string
     */
    public function getShowGallery()
    {
        return $this->showGallery;
    }

    /**
     * Set showVideo
     *
     * @param string $showVideo
     *
     * @return Content
     */
    public function setShowVideo($showVideo)
    {
        $this->showVideo = $showVideo;

        return $this;
    }

    /**
     * Get showVideo
     *
     * @return string
     */
    public function getShowVideo()
    {
        return $this->showVideo;
    }

    /**
     * Set folder
     *
     * @param string $folder
     *
     * @return Content
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Get folder
     *
     * @return string
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Content
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set section
     *
     * @param \Salatino\EntityBundle\Entity\Section $section
     *
     * @return Content
     */
    public function setSection(\Salatino\EntityBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \Salatino\EntityBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set bigPicture
     *
     * @param string $bigPicture
     *
     * @return Content
     */
    public function setBigPicture($bigPicture)
    {
        $this->bigPicture = $bigPicture;

        return $this;
    }

    /**
     * Get bigPicture
     *
     * @return string
     */
    public function getBigPicture()
    {
        return $this->bigPicture;
    }
}
