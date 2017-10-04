<?php

namespace App\Modules\Catalog\Models;

use Moloquent\Eloquent\Model;

class Area extends Model
{
    public $show_count = 10;
    public $query_where = [];

    public function getWithFilter($params=null){
        if(isset($params['show_count'])){
            $this->show_count = $params['show_count'];
        }
        if(isset($params['parent_id'])){
            $this->query_where['parent_id'] = $params['parent_id'];
        }
        return $this->where($this->query_where)->paginate($this->show_count);
    }
}
