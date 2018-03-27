<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service
 *
 * @author fayedumdum
 */
class service {
    
    
    private $service_id, $service_name, $service_description, $service_price, $service_picture, $service_hours, $sp_id;
    
    
    /*
     * Service constructor.
     * @param $service_id
     * @param $service_name
     * @param $service_description
     * @param $service_price
     * @param $service_picture
     * @param $service_hours
     * @param $sp_id
     */
    
   public function __construct($service_id, $service_name, $service_description, $service_price, $service_picture, $service_hours, $sp_id) {
        $this->service_id=$service_id;
        $this->service_name=$service_name;
        $this->service_description=$service_description;
        $this->service_price=$service_price;
        $this->service_picture=$service_picture;
        $this->service_hours=$service_hours;
        $this->sp_id=$sp_id;
    }
    
    /**
     * @return mixed
     */
    
    public function getServiceId(){
        return $this->service_id;
    }
    /*
     * @param mixed $service_id
     */
    public function setServiceId($service_id){
        $this->service_id=$service_id;
    }
        /**
     * @return mixed
     */
    
    public function getServiceName(){
        return $this->service_name;
    }
    /*
     * @param mixed $service_name
     */
    public function setServiceName($service_name){
        $this->service_name=$service_name;
    }
        /**
     * @return mixed
     */
    
    public function getServiceDesc(){
        return $this->service_description;
    }
    /*
     * @param mixed $service_description
     */
    public function setServiceDesc($service_description){
        $this->service_description=$service_description;
    }
        /**
     * @return mixed
     */
    public function getServicePrice(){
        return $this->service_price;
    }
    /*
     * @param mixed $service_price
     */
    public function setServicePrice($service_price){
        $this->service_price=$service_price;
    }
    
        /**
     * @return mixed
     */
    
    public function getServicePicture(){
        return $this->service_picture;
    }
    /*
     * @param mixed $service_picture
     */
    public function setServicePicture($service_picture){
        $this->service_picture=$service_picture;
    }
    /**
     * @return mixed
     */
    
    public function getServiceHours(){
        return $this->service_hours;
    }
    /*
     * @param mixed $service_id
     */
    public function setServiceHours($service_hours){
        $this->service_hours=$service_hours;
    }
    
        /**
     * @return mixed
     */
    
    public function getSpId(){
        return $this->sp_id;
    }
    /*
     * @param mixed $sp_id
     */
    public function setSpId($sp_id){
        $this->sp_id=$sp_id;
    }
}
