<?php

namespace App\Modules\Langs\Helpers;

use App\Modules\Langs\Models\Locale;
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

        $locales = Locale::where(['status'=>1])->get()->pluck('abbr', 'id');

        if(count($locales)>1){
            unset($locales[1]);
            $this->locales = $locales;
        }else{
            $this->locales = $locales;
        }

        $this->language = $this->getLang();
    }

    protected function __clone(){}

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function translate($key, $value = null){

        if(is_null($this->translations)){
            $this->translations = \App\Modules\I18n\Models\Translation::where('locale_id', $this->getLang()->id)
                                                                         ->pluck('value', 'full_key');
        }

        if(isset($this->translations[$key])){

            return $this->translations[$key];
        }

        if(is_null($this->translations_etalon)){
//            dd(array_keys(($this->locales)->toArray())[0]);
            $this->translations_etalon = \App\Modules\I18n\Models\Translation::where('locale_id', 1)->get()
                                                                                ->pluck('value', 'full_key');
        }



        if(isset($this->translations_etalon[$key])){

            return $this->translations_etalon[$key];
        }

        if(isset($value) AND !empty($value)){

            $parts = explode('__', $key);

            $translate = new \App\Modules\I18n\Models\Translation();
            $translate->full_key = $key;
            $translate->section = $parts[0];
            $translate->type = $parts[1];
            $translate->key = $parts[2];
            $translate->value = $value;
            $keys = array_keys($this->locales->toArray());

            $translate->locale_id = $keys[0];
            $translate->save();

            $this->translations_etalon[$key] = $value;

            return $translate->value;
        }else{
            return $key;
        }
    }


    public function getLang(){
        if( ! $this->language ){
            $this->setLang();
        }
        return $this->language;
    }

    public function setLang($abbr = null){
        if($abbr){
            $this->language = Locale::where('abbr', $abbr)->firstOrFail();
        }else{
//            if(in_array(config('app.locale'),array_keys($this->locales->toArray()))){
            if(in_array(Session::get('language'), $this->locales->toArray())){
                $this->language = Locale::where('abbr', Session::get('language'))->first();
            }else{
                $languages = Locale::all();
                if(count($languages)>1){
                    $this->language = $languages[1];
                }else{
                    $this->language = Locale::first();
                }
            }
        }
    }

}
