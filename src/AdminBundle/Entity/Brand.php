<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand")
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"collate":"utf8_general_ci"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, options={"collate":"utf8_general_ci"})
     */
    private $brand;
    
    /**
     * Many Brands have One Model
     * @ORM\ManyToOne(targetEntity="Model", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     * 
     */
    private $model;
    
    
    public function __construct()
    {
        $this->model = new ArrayCollection();
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
     * Set brand
     *
     * @param string $brand
     *
     * @return Brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param \AdminBundle\Entity\Model $model
     *
     * @return Brand
     */
    public function setModel(\AdminBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \AdminBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }
}
