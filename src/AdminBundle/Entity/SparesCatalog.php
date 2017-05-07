<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="spares_catalog")
 */
class SparesCatalog {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"collate":"utf8_general_ci"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, options={"collate":"utf8_general_ci"})
     */
    private $spare;
    
    /**
     * Many Spares have One Brand
     * @ORM\ManyToOne(targetEntity="Category")
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
     * Set spare
     *
     * @param string $spare
     *
     * @return SparesCatalog
     */
    public function setSpare($spare)
    {
        $this->spare = $spare;

        return $this;
    }

    /**
     * Get spare
     *
     * @return string
     */
    public function getSpare()
    {
        return $this->spare;
    }

    /**
     * Set category
     *
     * @param \AdminBundle\Entity\category $category
     *
     * @return SparesCatalog
     */
    public function setCategory(\AdminBundle\Entity\category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AdminBundle\Entity\category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
