<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="model")
 */
 class Model {
     
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"collate":"utf8_general_ci"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50, options={"collate":"utf8_general_ci"})
     */
    protected $model;


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
     * Set model
     *
     * @param string $model
     *
     * @return Model
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
}
