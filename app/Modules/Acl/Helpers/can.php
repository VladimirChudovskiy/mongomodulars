<?php

use App\Modules\Acl\Helpers\Rules;

if (! function_exists('can')) {
    function can($key,  $value = null){

        $rules_object = Rules::getInstance();

        $res_UDP = $rules_object->checkUDP($key, $value);
        if($res_UDP == true){
            return $value = false;
        }

        $res_UAP =  $rules_object->checkUAP($key, $value);
        if($res_UAP == true){
            return $value = true;
        }

        $res_RDP =$rules_object->checkRDP($key, $value);
        if($res_RDP == true){
            return $value = false;
        }

        $res_RAP = $rules_object->checkRAP($key, $value);
        if($res_RAP == true){
            return $value = true;
        }

        return  $value = false;
    }

}