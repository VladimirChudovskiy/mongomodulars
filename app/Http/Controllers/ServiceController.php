<?php

namespace App\Http\Controllers;

use App\Modules\Acl\Models\User;
use App\Modules\Core\Http\Controllers\BaseController;
use App\Modules\Service\Models\Command;
use App\Modules\Service\Models\Ecb;
use App\Modules\Service\Models\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends BaseController
{

    public function index($uid)
    {
        $service_model = new Service();

        $this->data['user'] = User::find($uid);
        $this->data['services'] = $service_model->getWithFilter(['user_id' => $uid]);

        return view('services.index', $this->data);
    }

    public function create($uid)
    {
        $this->data['user'] = User::find($uid);
        $this->data['available_kinds'] = [
            'box' => 'Box',
            'product' => 'Product',
            'mix' => 'Mix'
        ];
        return view('services.create', $this->data);
    }

    public function store(Request $request, $uid)
    {
        $user = User::find($uid);

        $data= [];
        $data = $request->all();
        $data['user_id'] = $uid;
        $data['code'] =  intval(rand(10, 99).time());
        $data['version'] = 1;

        $service = new Service();
        $service->create($data);
//        $service->createService($request, $uid);

        return redirect(route('services.show', $service->_id));
    }

    public function show($id)
    {
        $this->data['service'] = Service::find($id);

        return view('services.show', $this->data);
    }

    public function qr($id){
        $this->data['service'] = Service::find($id);

        return view('services.qr', $this->data);
    }

    public function edit($id)
    {
        //
    }

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
        $service = Service::find($id);
        $uid = $service->user_id;
        $service->delete();

        return redirect(route('services.index', $uid));
    }

    public function ports($sid){
        $this->data['service'] = Service::find($sid);
        $this->data['available_port_types'] = [
            'input' => 'Input',
            'output' => 'Output',
            'mix' => 'Mix',
        ];

        return view('service::services.ports', $this->data);
    }

    public function portStore(Request $request, $sid){
        $service = Service::find($sid);
        $service->addPort([
            'system' => $request->input('system'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return redirect(route('services.ports', $service->_id));
    }

    public function portConnect($sid, $port_system_name){
        $this->data['service'] = Service::find($sid);
        $this->data['current_port'] = $port_system_name;
        $this->data['user'] = User::find($this->data['service']->user_id);
        $this->data['free_rel_ports'] = [];
        $ecb_model = new Ecb();
        foreach ($ecb_model->getWithFilter(['user_id'=>$this->data['service']->user_id]) as $item){
            $free_ports = $item->getFreePorts();
            if(count($free_ports) > 0){
                $this->data['free_rel_ports'][] = [
                    'rel_id' => $item->_id,
                    'ecb_name' => $item->name,
                    'ports' => $free_ports
                ];
            }
        }

        return view('services.ports.connect', $this->data);
    }

    public function portDoConnect($sid, $service_port, $ecb_id, $ecb_port){
        $service = Service::find($sid);
        //$service->connectPort($service_port, $ecb_id, $ecb_port);
        $ports = $service->ports;
        foreach ($ports as $k=>$item){
            if($item['system'] == $service_port){
                $ports[$k]['rel_id'] = $ecb_id;
                $ports[$k]['rel_port'] = $ecb_port;
            }
        }
        $service->ports = $ports;
        $service->save();


        $ecb = Ecb::find($ecb_id);
        //$ecb->connectPort($ecb_port, $sid, $service_port);
        $ports = $ecb->ports;
        foreach ($ports as $k=>$item){
            if($item['system'] == $ecb_port){
                $ports[$k]['rel_id'] = $sid;
                $ports[$k]['rel_port'] = $service_port;
            }
        }
        $ecb->ports = $ports;
        $ecb->save();


        return redirect(route('services.ports', $sid));
    }

    public function portDisconnect($sid, $port_system_name){

    }

    public function commands($sid){
        $this->data['service'] = Service::find($sid);

        $command_model = new Command();

        $this->data['commands'] = $command_model->getWithFilter(['service_id' => $sid]);

        return view('commands.index', $this->data);
    }

    public function createCommand($sid){
        $this->data['service'] = Service::find($sid);

        return view('commands.create', $this->data);
    }

    public function storeCommand(Request $request, $sid){
        $this->data['service'] = Service::find($sid);
        $command = new Command();
        $command->name = $request->input('name');
        $command->system = $request->input('system');
        $command->describe = $request->input('describe');
        $command->service_id = $sid;
        $command->save();

        return redirect(route('commands.index', $sid));
    }

    public function editCommand($sid, $cid){
        $this->data['service'] = Service::find($sid);
        $this->data['command'] = Command::find($cid);

        return view('commands.edit', $this->data);
    }


}
