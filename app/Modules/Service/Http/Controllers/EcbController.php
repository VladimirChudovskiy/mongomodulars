<?php

namespace App\Modules\Service\Http\Controllers;

use App\Modules\Acl\Models\User;
use App\Modules\Service\Models\Ecb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EcbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uid)
    {
        $ecb_model = new Ecb();

        $this->data['user'] = User::find($uid);
        $this->data['ecbs'] = $ecb_model->getWithFilter(['user_id' => $uid]);

        return view('service::ecbs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uid)
    {
        $this->data['user'] = User::find($uid);

        return view('service::ecbs.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $uid)
    {
        $user = User::find($uid);

        $ecb = new Ecb();
        $ecb->name = $request->input('name');
        $ecb->user_id = $uid;
        $ecb->save();

        return redirect(route('ecbs.show', $ecb->_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['ecb'] = Ecb::find($id);

        return view('service::ecbs.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ports($eid){
        $this->data['ecb'] = $ecb = Ecb::find($eid);
        $this->data['available_port_types'] = [
            'input' => 'Input',
            'output' => 'Output',
            'mix' => 'Mix',
        ];

        return view('service::ecbs.ports', $this->data);
    }

    public function portStore(Request $request, $eid){
        $ecb = Ecb::find($eid);
        $ecb->addPort([
            'system' => $request->input('system'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return redirect(route('ecbs.ports', $ecb->_id));
    }
}
