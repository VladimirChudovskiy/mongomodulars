<?php

use Illuminate\Database\Seeder;
use \App\Modules\I18n\Models\Locale;
use \App\Modules\I18n\Models\Translation;

class create_i18n_seeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->locales();
        $this->translations();
    }

    public function translations(){
        $full_key = 'test__test__test';
        $translation = Translation::where('full_key', $full_key)->first();
        if(!$translation){
            $translation = new Translation();
            $translation->full_key = $full_key;
            $translation->value_etl = 'Test etalon';
            $translation->value_en = 'Test english';
            $translation->value_ru = 'Test russian';
            $translation->save();
        }
    }

    public function locales(){
        $locale_etl = Locale::where('abbr', 'etl')->first();
        if(!$locale_etl){
            $locale_etl = new Locale();
            $locale_etl->abbr = 'etl';
            $locale_etl->name = 'Etalon';
            $locale_etl->active = true;
            $locale_etl->save();
        }
        $locale_ru = Locale::where('abbr', 'ru')->first();
        if(!$locale_ru){
            $locale_ru = new Locale();
            $locale_ru->abbr = 'ru';
            $locale_ru->name = 'Russian';
            $locale_ru->active = true;
            $locale_ru->save();
        }
        $locale_en = Locale::where('abbr', 'en')->first();
        if(!$locale_en){
            $locale_en = new Locale();
            $locale_en->abbr = 'en';
            $locale_en->name = 'English';
            $locale_en->active = true;
            $locale_en->save();
        }
    }
}
