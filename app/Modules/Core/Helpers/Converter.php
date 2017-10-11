<?php

namespace App\Modules\Core\Helpers;

class Converter {

    public $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    protected function setProp($name, $value){
        if(is_array($this->data)){
            $this->data[$name] = $value;
        }elseif(is_object($this->data)){
            $this->data->{$name} = $value;
        }else{
            $this->data = $value;
        }
    }

    protected function getItemValue($key = null){
        if($key == null){
            return $this->data;
        }
        if(is_array($this->data)){
            return $this->data[$key];
        }else{
            return $this->data->{$key};
        }
    }

    public function get(){
        return $this->data;
    }

    public function toInt($key = null){
        $this->setProp($key, intval($this->data[$key]));

        return $this;
    }

    public function toBool($key = null){
        $value = $this->getItemValue($key);
        if(in_array($value, ['active', '1', 'true', 1, true])){
            $this->setProp($key, true);
        }else{
            $this->setProp($key, false);
        }

        return $this;
    }


}