<?php

namespace App\Modules\Service\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Moloquent\Eloquent\Model;

class Ecb extends Model
{
    use TranslateProperty;

    public $show_count = 10;
    public $query_where = [];

    public function getWithFilter($params=null){
        if(isset($params['show_count'])){
            $this->show_count = $params['show_count'];
        }
        if(isset($params['user_id'])){
            $this->query_where['user_id'] = $params['user_id'];
        }
        return $this->where($this->query_where)->paginate($this->show_count);
    }

    public function getPorts(){
        if($this->countPorts() > 0)
            return $this->ports;
        return [];
    }

    public function countPorts(){
        if($this->ports)
            return count($this->ports);
        return 0;
    }

    public function addPort($data){
        if($this->countPorts() == 0){
            $this->ports = [
                $data
            ];
        }else{
            $this->ports = array_merge($this->ports, [$data]);
        }
        $this->save();
    }

    public function getPort($system){
        foreach ($this->ports as $item){
            if($item['system'] == $system){
                return $item;
            }
        }
    }

    public static function getPortInfo($rel_id, $port_system_name){
        $ecb = self::find($rel_id);
        $port = $ecb->getPort($port_system_name);

        return $ecb->name . ' port ' . $port['name'];
    }

    public function getFreePorts(){
        $result = [];
        foreach ($this->ports as $item){
            if( $this->isFreePort($item) ){
               $result[] = $item;
            }
        }
        return $result;
    }

    public function isFreePort($item){
        if(isset($item['rel_id']) && isset($item['rel_port']))
            return false;
        return true;
    }

//    public function connectPort($ecb_port, $rel_id, $rel_port){
//        foreach ($this->ports as &$item){
//            if($item['system'] == $ecb_port){
//                $item['rel_id'] = $rel_id;
//                $item['rel_port'] = $rel_port;
//            }
//        }
//        $this->save();
//    }

}
