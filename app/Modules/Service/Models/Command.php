<?php

namespace App\Modules\Service\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Moloquent\Eloquent\Model;

class Command extends Model
{
    use TranslateProperty;
    public $show_count = 10;
    public $query_where = [];

    public function getWithFilter($params=null){
        if(isset($params['show_count'])){
            $this->show_count = $params['show_count'];
        }
        if(isset($params['service_id'])){
            $this->query_where['service_id'] = $params['service_id'];
        }
        return $this->where($this->query_where)->paginate($this->show_count);
    }

}
