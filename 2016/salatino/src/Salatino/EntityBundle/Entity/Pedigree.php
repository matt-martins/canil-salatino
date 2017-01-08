<?php
namespace Salatino\EntityBundle\Entity;

use Salatino\EntityBundle\Entity\Component\EntityComponent;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pedigree
 *
 * @ORM\Table(name="pedigree")
 * @ORM\Entity
 */
class Pedigree extends EntityComponent
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp01;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp02;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp03;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp04;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp05;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp06;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp07;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp08;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp09;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp10;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp11;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp12;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp13;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cp14;


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
     * Set cp01
     *
     * @param string $cp01
     *
     * @return Pedigree
     */
    public function setCp01($cp01)
    {
        $this->cp01 = $cp01;

        return $this;
    }

    /**
     * Get cp01
     *
     * @return string
     */
    public function getCp01()
    {
        return $this->cp01;
    }

    /**
     * Set cp02
     *
     * @param string $cp02
     *
     * @return Pedigree
     */
    public function setCp02($cp02)
    {
        $this->cp02 = $cp02;

        return $this;
    }

    /**
     * Get cp02
     *
     * @return string
     */
    public function getCp02()
    {
        return $this->cp02;
    }

    /**
     * Set cp03
     *
     * @param string $cp03
     *
     * @return Pedigree
     */
    public function setCp03($cp03)
    {
        $this->cp03 = $cp03;

        return $this;
    }

    /**
     * Get cp03
     *
     * @return string
     */
    public function getCp03()
    {
        return $this->cp03;
    }

    /**
     * Set cp04
     *
     * @param string $cp04
     *
     * @return Pedigree
     */
    public function setCp04($cp04)
    {
        $this->cp04 = $cp04;

        return $this;
    }

    /**
     * Get cp04
     *
     * @return string
     */
    public function getCp04()
    {
        return $this->cp04;
    }

    /**
     * Set cp05
     *
     * @param string $cp05
     *
     * @return Pedigree
     */
    public function setCp05($cp05)
    {
        $this->cp05 = $cp05;

        return $this;
    }

    /**
     * Get cp05
     *
     * @return string
     */
    public function getCp05()
    {
        return $this->cp05;
    }

    /**
     * Set cp06
     *
     * @param string $cp06
     *
     * @return Pedigree
     */
    public function setCp06($cp06)
    {
        $this->cp06 = $cp06;

        return $this;
    }

    /**
     * Get cp06
     *
     * @return string
     */
    public function getCp06()
    {
        return $this->cp06;
    }

    /**
     * Set cp07
     *
     * @param string $cp07
     *
     * @return Pedigree
     */
    public function setCp07($cp07)
    {
        $this->cp07 = $cp07;

        return $this;
    }

    /**
     * Get cp07
     *
     * @return string
     */
    public function getCp07()
    {
        return $this->cp07;
    }

    /**
     * Set cp08
     *
     * @param string $cp08
     *
     * @return Pedigree
     */
    public function setCp08($cp08)
    {
        $this->cp08 = $cp08;

        return $this;
    }

    /**
     * Get cp08
     *
     * @return string
     */
    public function getCp08()
    {
        return $this->cp08;
    }

    /**
     * Set cp09
     *
     * @param string $cp09
     *
     * @return Pedigree
     */
    public function setCp09($cp09)
    {
        $this->cp09 = $cp09;

        return $this;
    }

    /**
     * Get cp09
     *
     * @return string
     */
    public function getCp09()
    {
        return $this->cp09;
    }

    /**
     * Set cp10
     *
     * @param string $cp10
     *
     * @return Pedigree
     */
    public function setCp10($cp10)
    {
        $this->cp10 = $cp10;

        return $this;
    }

    /**
     * Get cp10
     *
     * @return string
     */
    public function getCp10()
    {
        return $this->cp10;
    }

    /**
     * Set cp11
     *
     * @param string $cp11
     *
     * @return Pedigree
     */
    public function setCp11($cp11)
    {
        $this->cp11 = $cp11;

        return $this;
    }

    /**
     * Get cp11
     *
     * @return string
     */
    public function getCp11()
    {
        return $this->cp11;
    }

    /**
     * Set cp12
     *
     * @param string $cp12
     *
     * @return Pedigree
     */
    public function setCp12($cp12)
    {
        $this->cp12 = $cp12;

        return $this;
    }

    /**
     * Get cp12
     *
     * @return string
     */
    public function getCp12()
    {
        return $this->cp12;
    }

    /**
     * Set cp13
     *
     * @param string $cp13
     *
     * @return Pedigree
     */
    public function setCp13($cp13)
    {
        $this->cp13 = $cp13;

        return $this;
    }

    /**
     * Get cp13
     *
     * @return string
     */
    public function getCp13()
    {
        return $this->cp13;
    }

    /**
     * Set cp14
     *
     * @param string $cp14
     *
     * @return Pedigree
     */
    public function setCp14($cp14)
    {
        $this->cp14 = $cp14;

        return $this;
    }

    /**
     * Get cp14
     *
     * @return string
     */
    public function getCp14()
    {
        return $this->cp14;
    }
}
