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

}
