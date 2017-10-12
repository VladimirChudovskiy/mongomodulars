<?php

namespace App\Modules\I18n\Models;

use App\Modules\Core\Models\Imodel;
use App\Modules\I18n\Traits\TranslateProperty;

class Translation extends Imodel
{

    public function getByAbbr($abbr = null){
        if($abbr == null){
            $abbr = l();
        }

        return $this->{'value_'.$abbr};
    }

    public function hasLocaleValue($locale){
        if(isset($this->{'value_'.$locale}) && !empty($this->{'value_'.$locale})){
            return true;
        }else{
            return false;
        }
    }

}
