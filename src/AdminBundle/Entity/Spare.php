<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\SpareRepository")
 * @ORM\Table(name="spare")

 */
class Spare {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"collate":"utf8_general_ci"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Many Spares have One Brand
     * @ORM\ManyToOne(targetEntity="SparesCatalog", fetch="EAGER")
     * @ORM\JoinColumn(name="spare_id", referencedColumnName="id") 
     */
    private $spare;

    /**
     * @ORM\Column(type="float", length=50, options={"collate":"utf8_general_ci"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=50, options={"collate":"utf8_general_ci"})
     */
    private $presence;

    /**
     * Many Spares have One Brand
     * @ORM\ManyToOne(targetEntity="Brand", fetch="EAGER")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id") 
     */
    private $brand;

    /**
     * Many Spares have One Brand
     * @ORM\ManyToOne(targetEntity="Category", fetch="EAGER")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id") 
     */
    private $category;


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
     * Set price
     *
     * @param float $price
     *
     * @return Spare
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set presence
     *
     * @param string $presence
     *
     * @return Spare
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;

        return $this;
    }

    /**
     * Get presence
     *
     * @return string
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Set spare
     *
     * @param \AdminBundle\Entity\SparesCatalog $spare
     *
     * @return Spare
     */
    public function setSpare(\AdminBundle\Entity\SparesCatalog $spare = null)
    {
        $this->spare = $spare;

        return $this;
    }

    /**
     * Get spare
     *
     * @return \AdminBundle\Entity\SparesCatalog
     */
    public function getSpare()
    {
        return $this->spare;
    }

    /**
     * Set brand
     *
     * @param \AdminBundle\Entity\Brand $brand
     *
     * @return Spare
     */
    public function setBrand(\AdminBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AdminBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set category
     *
     * @param \AdminBundle\Entity\Category $category
     *
     * @return Spare
     */
    public function setCategory(\AdminBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AdminBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
