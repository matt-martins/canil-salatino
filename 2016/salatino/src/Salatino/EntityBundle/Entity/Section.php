<?php
namespace Salatino\EntityBundle\Entity;

use Salatino\EntityBundle\Entity\Component\EntityComponent;
use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="sections")
 * @ORM\Entity
 */
class Section extends EntityComponent
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="permalink", type="string", length=255, nullable=true)
     */
    private $permalink;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="group", type="string", length=255, nullable=true)
     */
    private $group;

    /**
     * @ORM\OneToMany(targetEntity="Content", mappedBy="content", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     * @ORM\OrderBy({"sequence" = "ASC", "id" = "DESC"})
     */
    private $contents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Section
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
     * Set permalink
     *
     * @param string $permalink
     *
     * @return Section
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Get permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Add content
     *
     * @param \Salatino\EntityBundle\Entity\Content $content
     *
     * @return Section
     */
    public function addContent(\Salatino\EntityBundle\Entity\Content $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \Salatino\EntityBundle\Entity\Content $content
     */
    public function removeContent(\Salatino\EntityBundle\Entity\Content $content)
    {
        $this->contents->removeElement($content);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Section
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set group
     *
     * @param string $group
     *
     * @return Section
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }
}
