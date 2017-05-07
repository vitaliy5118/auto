<?php

namespace AdminBundle\Services\Crud;
/**
 * Operating of all CRUD operations
 * @author Виталий
 */
interface MyCrudInterface {
    /**
     * 
     * @param type $id
     */
    public function getDataById($id);
    /**
     * Get All data and make object's array
     */
    public function makeDataContainer();
    
    /**
     * Save data
     */
    public function save();
    
    /**
     * Edit data
     * @param $id
     */
    public function edit($id);
    
    /**
     * Delete data
     * @param type $id
     */
    public function delete($id);
}
