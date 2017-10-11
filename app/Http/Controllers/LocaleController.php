<?php

namespace App\Http\Controllers;

use App\Modules\Core\Http\Controllers\BaseController;
use App\Modules\I18n\Models\Locale;
use Illuminate\Http\Request;

class LocaleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['locales'] = Locale::filter(filter_from_request())->paginate(10);

        return view('locales.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locales.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = converter($request->except('_token'))
            ->toBool('active')
            ->get();

        $locale = (new Locale())->store($form_data);

        return redirect(route('locales.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['locale'] = Locale::find($id);

        return view('locales.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locale = Locale::find($id);
        $form_data = converter($request->except('_token'))
            ->toBool('active')
            ->get();

        $locale->update($form_data);

        return redirect(route('locales.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locale = Locale::find($id);
        $locale->delete();

        return redirect(route('locales.index'));
    }
}
