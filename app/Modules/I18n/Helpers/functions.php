<?php

use App\Modules\I18n\Helpers\Translation;

/**
 * Get current locale
 * @return string current locale
 */
function l(){
    return config('app.locale');
}

/**
 * Get item translation
 * @param $obj - Object for translation
 * @param $prop - name property for translation
 * @param null $locale - locale for translation. Default value config('app.locale')
 * @return string - translation value
 */
function t($full_key, $value, $locale = null){
    if($locale == null){
        $locale = l();
    }
    if(is_string($full_key)){
        $translation_object = Translation::getInstance();
        return $translation_object->translate($full_key, $value);
    }else{
        $full_key->t($value, $locale);
    }

//
//    if(isset($obj->{$prop.'_'.$locale})){
//        return $obj->{$prop.'_'.$locale};
//    }
//
//    if(isset($obj->{$prop.'_etl'})){
//        return $obj->{$prop.'_etl'};
//    }
//
//    if(isset($obj->{$prop})){
//        return $obj->{$prop};
//    }
//
//    return null;
}