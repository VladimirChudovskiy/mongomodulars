<?php

namespace App\Modules\I18n\Helpers;

use App\Modules\I18n\Models\Locale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Translation
{
    protected static $instance = null;

    public $locales = null;
    public $language = null;
    public $translations_etalon = null;
    public $translations = null;


    protected function __construct(){
        $this->locales = Locale::all();
        $trans = \App\Modules\I18n\Models\Translation::all();

        foreach ($trans as $t){
            $this->translations[$t->full_key] = $t;
        }
    }

    protected function __clone(){}

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }


    public function getTranslation($full_key, $locale = null){
        if($locale == null){
            $locale = l();
        }
        return $this->translations[$full_key]->{'value_'.$locale};
    }


    public function createTranslation($full_key, $value, $locale = 'etl'){
        $parts = explode('__', $full_key);
        $data = [
            'section' => $parts[0],
            'type' => $parts[1],
            'item' => $parts[2],
            'full_key' => $full_key,
            'value_'.$locale => $value
        ];

        $this->translations[$full_key] = (new \App\Modules\I18n\Models\Translation())->store($data);
    }


    public function existTranslation($full_key){
        return isset($this->translations[$full_key]);
    }


    public function existTranslationByLocale($full_key, $locale = null){
        if($locale == null){
            $locale = l();
        }
        return $this->translations[$full_key]->hasLocaleValue($locale);
    }


}
