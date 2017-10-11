<?php

namespace App\Modules\Core\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Moloquent\Eloquent\Model;

class Imodel extends Model
{
    use TranslateProperty;

    public function scopeFilter($query, $params){
        if(isset($params) && !empty($params)){
            $this->prepareWhere($query, $params);
        }

        return $query;
    }


    public function prepareWhere($query, $filters){
        foreach ($filters as $item){
            if(!empty($item['value']) && $item['value'] != '%%'){
                $query->where($item['field'], $item['operation'], $item['value']);
            }
        }
    }


    public function store($data){
        foreach ($data as $k=>$v){
            if($k != '_token' && $k != '_method'){
                $this->$k = $v;
            }
        }
        return $this->save();
    }

    public function update(array $attributes = [], array $options = [])
    {
        if (! $this->exists) {
            return false;
        }

        return $this->fill($attributes)->save($options);
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

}
