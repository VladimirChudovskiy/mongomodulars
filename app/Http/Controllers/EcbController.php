<?php

namespace App\Http\Controllers;

use App\Modules\Acl\Models\User;
use App\Modules\Core\Http\Controllers\BaseController;
use App\Modules\Service\Models\Ecb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EcbController extends BaseController
{
    public function index($uid)
    {

        $ecb_model = new Ecb();

        $this->data['user'] = User::find($uid);
        $this->data['ecbs'] = $ecb_model->getWithFilter(['user_id' => $uid]);

        return view('ecbs.index', $this->data);
    }

    public function create($uid)
    {
        $this->data['user'] = User::find($uid);

        return view('ecbs.create', $this->data);
    }

    public function store(Request $request, $uid)
    {
        $user = User::find($uid);

        $ecb = new Ecb();
        $ecb->name = $request->input('name');
        $ecb->user_id = $uid;
        $ecb->save();

        return redirect(route('ecbs.show', $ecb->_id));
    }

    public function show($id)
    {
        $this->data['ecb'] = Ecb::find($id);

        return view('service::ecbs.show', $this->data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

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

        return view('ecbs.ports', $this->data);
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
