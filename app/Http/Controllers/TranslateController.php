<?php

namespace App\Http\Controllers;

use App\Modules\Core\Http\Controllers\BaseController;
use App\Modules\I18n\Models\Locale;
use App\Modules\I18n\Models\Translation;
use Illuminate\Http\Request;

class TranslateController extends BaseController
{

    public function index(){
        $this->data['locales'] = Locale::all();
        $this->data['translations'] = Translation::all();

        return view('translations.index', $this->data);
    }

}
