<?php

namespace App\Modules\Acl\Helpers;

use App\Modules\Acl\Models\Permission;
use App\Modules\Acl\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Rules
{
    protected static $instance = null;

    public $rules = null;

    protected function __construct(){

        $au_user= Auth::user();
        $user = User::find($au_user->id);

        $pre_rules['UDP'] = $user->denyPermissions()->pluck('name','id')->toArray();
        $pre_rules['UAP'] = $user->allowPermissions()->pluck('name','id')->toArray();
//
        $roles = $user->roles()->get();
        $deny= [];
        $allow= [];
        foreach ($roles as $role){
            $deny[] = $role->denyPermissions()->pluck('name','id')->toArray();
            $allow[] = $role->allowPermissions()->pluck('name','id')->toArray();
        }
        $pre_rules['RDP'] = call_user_func_array('array_merge', $deny);
        $pre_rules['RAP'] = call_user_func_array('array_merge', $allow);

        $UDP= [];
        foreach ($pre_rules['UDP'] as $k => $item){
            $n= explode('__', $item);
            $UDP[$n[0]][$n[1]][$n[2]] = implode('__', $n);
        }
        $UAP= [];
        foreach ($pre_rules['UAP'] as $k => $item){
            $n= explode('__', $item);
            $UAP[$n[0]][$n[1]][$n[2]] = implode('__', $n);
        }
        $RDP= [];
        foreach ($pre_rules['RDP'] as $k => $item){
            $n= explode('__', $item);
            $RDP[$n[0]][$n[1]][$n[2]] = implode('__', $n);
        }
        $RAP= [];
        foreach ($pre_rules['RAP'] as $k => $item){
            $n= explode('__', $item);
            $RAP[$n[0]][$n[1]][$n[2]] = implode('__', $n);
        }
        $this->data['UDP']= $UDP;
        $this->data['UAP']= $UAP;
        $this->data['RDP']= $RDP;
        $this->data['RAP']= $RAP;

    }

    protected function __clone(){}

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function checkUDP($key, $value = null){
        $udp = $this->data['UDP'];
        $k = explode('__', $key);

        if($udp) {
            if (array_key_exists($k[0], $udp)) {
                if (array_key_exists($k[1], $udp[$k[0]])) {
                    if (array_key_exists($k[2], $udp[$k[0]][$k[1]])) {
                        $value = true;
                    }elseif ($k[2] == '*'){
                        $value = true;
                        //-->
                    }elseif ($k[2] == $this->data['user']['id']){
                        $value = true;
                    }elseif ($k[2] =='own'){

                        $value = false;
                        //-->
                    }else{
                        $value = false;
                    }
                }else{
                    $value = false;
                }
            }else{
                $value = false;
            }
        }else{
            $value = false;
        }
        return  $value;
    }

    public function checkUAP($key, $value = null){
        $uap = $this->data['UAP'];
        $k = explode('__', $key);

        if($uap) {
            if (array_key_exists($k[0], $uap)) {
                if (array_key_exists($k[1], $uap[$k[0]])) {
                    if (array_key_exists($k[2], $uap[$k[0]][$k[1]])) {
                        $value = true;
                    }elseif ($k[2] == '*'){
                        $value = true;
                    }else{
                        $value = false;
                    }
                }else{
                    $value = false;
                }
            }else{
                $value = false;
            }

        }else{
            $value = false;
        }
        return  $value;

    }

    public function checkRDP($key, $value = null){
        $rdp = $this->data['RDP'];
        $k = explode('__', $key);

        if($rdp) {
            if (array_key_exists($k[0], $rdp)) {
                if (array_key_exists($k[1], $rdp[$k[0]])) {
                    if (array_key_exists($k[2], $rdp[$k[0]][$k[1]])) {
                        $value = true;
                    }elseif ($k[2] == '*'){
                        $value = true;
                    }else{
                        $value = false;
                    }
                }else{
                    $value = false;
                }
            }else{
                $value = false;
            }
        }else{
            $value = false;
        }
        return  $value;

    }

    public function checkRAP($key, $value = null){
        $rap = $this->data['RAP'];
        $k = explode('__', $key);

        if($rap) {
            if (array_key_exists($k[0], $rap)) {
                if (array_key_exists($k[1], $rap[$k[0]])) {
                    if (array_key_exists($k[2], $rap[$k[0]][$k[1]])) {
                        $value = true;
                    }elseif ($k[2] == '*'){
                        $value = true;
                    }else{
                        $value = false;
                    }
                }else{
                    $value = false;
                }

            }else{
                $value = false;
            }
        }else{
            $value = false;
        }
        return  $value;

    }

}