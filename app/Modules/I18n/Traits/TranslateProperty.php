<?php

namespace App\Modules\I18n\Traits;

trait TranslateProperty {

    public function t($property, $locale = null){
        if($locale == null){
            $locale = l();
        }

        if(isset($this->{$property.'_'.$locale})){
            return $this->{$property.'_'.$locale};
        }

        if(isset($this->{$property.'_etl'})){
            return $this->{$property.'_etl'};
        }

        if(isset($this->{$property})){
            return $this->{$property};
        }

        return null;
    }

}