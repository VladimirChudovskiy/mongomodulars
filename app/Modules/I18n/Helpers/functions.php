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
function t($full_key, $value = null, $locale = null){
    if($locale == null){
        $locale = l();
    }

    if( ! is_string($full_key)){
        $full_key->t($value, $locale);
    }

    $t_instance = Translation::getInstance();

    if( ! $t_instance->existTranslation($full_key) ){
        $t_instance->createTranslation($full_key, $value, 'etl');
    }

    if($t_instance->existTranslationByLocale($full_key, $locale)){
        return $t_instance->getTranslation($full_key, $locale);
    }else{
        return $t_instance->getTranslation($full_key, 'etl');
    }

}
