<?php

namespace AdminBundle\Services\Crud;

class Spare {

    public $id;
    public $model;
    public $brand;
    public $spare;
    public $category;
    public $price;
    public $presence;

    /**
     * Initializes a new Spare Container.
     * 
     * @param type $dataArray
     */
    public function __construct($dataArray) {

        foreach ($this as $name => $value) {

            $method = "get" . $name;

            if (method_exists($dataArray, "$method") && !is_object($dataArray->$method())) {
                $this->$name = $dataArray->$method();
            } elseif (method_exists($dataArray, $method) && is_object($dataArray->$method())) {
                $this->$name = $dataArray->$method()->$method();
            } elseif ($name == 'model') {

                $this->model = $dataArray->getBrand()->getModel()->getModel();
            }
        }
    }

}
