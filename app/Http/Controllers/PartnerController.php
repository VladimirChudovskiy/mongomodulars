<?php

namespace App\Http\Controllers;

use App\Modules\Acl\Models\User;
use App\Modules\Core\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PartnerController extends BaseController
{
    public function index(){
        $user_model = new User();
        $this->data['partners'] = $user_model->getWithFilter(['partner'=>true]);

        return view('partners.index', $this->data);
    }

    public function show($uid){
        $this->data['user'] = User::find($uid);

        return view('partners.show', $this->data);
    }

    public function enable($uid){
        $user = User::find($uid);
        $user->enablePartner();

        return redirect(route('partner.show', $uid));
    }

    public function disable($uid){
        $user = User::find($uid);
        $user->disablePartner();


        return redirect(route('partner.show', $uid));
    }

}
