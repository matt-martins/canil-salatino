<?php
namespace Salatino\EntityBundle\Entity\Component;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class EntityComponent
{
	/**
	 *
	 * @ORM\Column(name="date_created", type="datetime", options={"default":"0000-00-00 00:00:00"})
	 */
	private $dateCreated;

	/**
	 *
	 * @ORM\Column(name="date_updated", type="datetime")
	 */
	private $dateUpdated;

	/**
	 * @ORM\Column(name="active", type="string", length=1, options={"default"="0", "fixed"=true}, nullable=true)
	 */
	private $isActive;

	/**
	 * @ORM\Column(type="integer", options={"default"="0"}, nullable=true)
	 */
	private $sequence;

	/**
	 * @ORM\PrePersist
	 */
	public function prePersist()
	{
		$dt = new \DateTime();
		$this->setDateCreated($dt);
		$this->setDateUpdated($dt);
	}

	/**
	 * @ORM\PreUpdate
	 */
	public function preUpdate()
	{
		$this->setDateUpdated(new \DateTime());
	}

	/**
	 * Set date_created
	 *
	 * @param \DateTime $dateCreated
	 * @return EntityDefault
	 */
	public function setDateCreated($dateCreated)
	{
		$this->dateCreated = $dateCreated;

		return $this;
	}

	/**
	 * Get date_created
	 *
	 * @return \DateTime
	 */
	public function getDateCreated()
	{
		return $this->dateCreated;
	}

	/**
	 * Set date_updated
	 *
	 * @param \DateTime $dateUpdated
	 * @return EntityDefault
	 */
	public function setDateUpdated($dateUpdated)
	{
		$this->dateUpdated = $dateUpdated;

		return $this;
	}

	/**
	 * Get date_updated
	 *
	 * @return \DateTime
	 */
	public function getDateUpdated()
	{
		return $this->dateUpdated;
	}

	/**
	 * Set isActive
	 *
	 * @param string $isActive
	 * @return EntityDefault
	 */
	public function setIsActive($isActive)
	{
		$this->isActive = $isActive;

		return $this;
	}

	/**
	 * Get isActive
	 *
	 * @return string
	 */
	public function getIsActive()
	{
		return $this->isActive;
	}

	/**
	 * Set sequence
	 *
	 * @param integer $sequence
	 * @return EntityDefault
	 */
	public function setSequence($sequence)
	{
		$this->sequence = $sequence;

		return $this;
	}

	/**
	 * Get sequence
	 *
	 * @return integer
	 */
	public function getSequence()
	{
		return $this->sequence;
	}
}
