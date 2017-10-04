<?php

namespace App\Modules\Acl\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Moloquent\Eloquent\Model;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, TranslateProperty;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    protected $hidden = ['password'];

    public $show_count = 10;
    public $query_where = [];

    public function getWithFilter($params=null){
        if(isset($params['show_count'])){
            $this->show_count = $params['show_count'];
        }
        if(isset($params['partner'])){
            $this->query_where['partner'] = true;
        }
        return $this->where($this->query_where)->paginate($this->show_count);
    }

    public function isPartner(){
        if(isset($this->partner) && $this->partner == true){
            return true;
        }else{
            return false;
        }
    }

    public function enablePartner(){
        if( ! $this->isPartner()){
            $this->partner = true;
            $this->save();
        }
        return $this;
    }

    public function disablePartner(){
        if($this->isPartner()){
            $this->partner = false;
            $this->save();
        }
        return $this;
    }

}
