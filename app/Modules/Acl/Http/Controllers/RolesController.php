<?php

namespace App\Modules\Acl\Http\Controllers;

use App\Modules\Acl\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->data = [];
    }

    public function index(){

        $this->data['roles'] = Role::all();

        return view('roles.index', $this->data);

    }

    public function create(){
        return view('roles.create');

    }

    public function store(Request $request){

        



    }

    public function edit($id){

    }

    public function update($id, Request $request){

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id){
        if($request->has('id')){
            return $this->removeById($request, $request->input('id'));
        }

        if($request->has('name')){
            $role = Role::where('name', $request->input('name'))->first();
            if( ! $role){
                $this->prepareErrorResponse("Role with this name doesn't exits");
                return response()->json($this->response);
            }
            return $this->removeById($role->id);
        }
        if($request->has('display_name')){
            $role = Role::where('display_name', $request->input('display_name'))->first();
            if( ! $role){
                $this->prepareErrorResponse("Role with this display name doesn't exits");
                return response()->json($this->response);
            }
            return $this->removeById($role->id);
        }
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachAllowPermission($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('id')){
            $id = (intval($request->get('id')));
            if(empty($id)||($id==null)){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }

            $permission = Permission::find($id);
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                return response()->json($this->response);
            }
            if($role->allowPermissions()->find($id)){

                $this->prepareErrorResponse("Role has this permission");
                return response()->json($this->response);
            }

            $role->allowPermissions()->attach($permission);
        }
        elseif($request->has('name')){
            if(!(strval($request->get('name')))){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }
            $name = $request->get('name');
            $permission = Permission::where('name', $name)->first();
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                return response()->json($this->response);
            }
            if($role->allowPermissions()->find($permission->id)){
                $this->prepareErrorResponse("Role has this role");
                return response()->json($this->response);
            }
            $role->allowPermissions()->attach($permission);
        }
        else{
            $this->prepareErrorResponse("Bad request, try id or name");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse("Permission attached");
        $this->response['data'] = $role;
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachAllowPermission($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('id')){
            $id = (intval($request->get('id')));
            if(empty($id)||($id==null)){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }

            $permission = Permission::find($id);
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                return response()->json($this->response);
            }
            if(!($role->allowPermissions()->find($id))){

                $this->prepareErrorResponse("Role does not has this permission");
                return response()->json($this->response);
            }

            $role->allowPermissions()->detach($permission);
        }
        elseif($request->has('name')){
            if(!(strval($request->get('name')))){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }
            $name = $request->get('name');
            $permission = Permission::where('name', $name)->first();
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                return response()->json($this->response);
            }
            if(!($role->allowPermissions()->find($permission->id))){
                $this->prepareErrorResponse("Role does not has this permission");
                return response()->json($this->response);
            }
            $role->allowPermissions()->detach($permission);
        }
        else{
            $this->prepareErrorResponse("Bad request, try id or name");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse("Permission detached");
        $this->response['data'] = $role;
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachDenyPermission($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('id')){
            $id = (intval($request->get('id')));
            if(empty($id)||($id==null)){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }

            $permission = Permission::find($id);
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                $this->response['error_value'] = $id;
                return response()->json($this->response);
            }
            if($role->denyPermissions()->find($id)){

                $this->prepareErrorResponse("Role has this permission");
                return response()->json($this->response);
            }

            $role->denyPermissions()->attach($permission);
        }
        elseif($request->has('name')){
            if(!(strval($request->get('name')))){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }
            $name = $request->get('name');
            $permission = Permission::where('name', $name)->first();
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                $this->response['error_value'] = $name;
                return response()->json($this->response);
            }
            if($role->denyPermissions()->find($permission->id)){
                $this->prepareErrorResponse("Role has this role");
                return response()->json($this->response);
            }
            $role->denyPermissions()->attach($permission);
        }
        else{
            $this->prepareErrorResponse("Bad request, try id or name");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse("Permission attached");
        $this->response['data'] = $role;
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachDenyPermission($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('id')){
            $id = (intval($request->get('id')));
            if(empty($id)||($id==null)){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }

            $permission = Permission::find($id);
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                $this->response['error_value'] = $id;
                return response()->json($this->response);
            }
            if(!($role->denyPermissions()->find($id))){

                $this->prepareErrorResponse("Role does not has this permission");
                return response()->json($this->response);
            }

            $role->denyPermissions()->detach($permission);
        }
        elseif($request->has('name')){
            if(!(strval($request->get('name')))){
                $this->prepareErrorResponse("Bad request");
                return response()->json($this->response);
            }
            $name = $request->get('name');
            $permission = Permission::where('name', $name)->first();
            if(empty($permission)||($permission==null)){
                $this->prepareErrorResponse("This permission does not exist");
                return response()->json($this->response);
            }
            if(!($role->denyPermissions()->find($permission->id))){
                $this->prepareErrorResponse("Role does not has this permission");
                $this->response['error_value'] = $name;
                return response()->json($this->response);
            }
            $role->denyPermissions()->detach($permission);
        }
        else{
            $this->prepareErrorResponse("Bad request, try id or name");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse("Permission detached");
        $this->response['data'] = $role;
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachAllowPermissions($rid, Request $request){
        // TODO check if user can do this

        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('ids')){
            $clear_str = str_replace(" ","",$request->get('ids'));
            $ids = (explode(",", $clear_str));

            $attached = [];
            $not_attached = [];
            foreach ($ids as $item){
                $id = (intval($item));
                if(empty($id)||($item==null)){
                    $this->prepareErrorResponse("Undefinite values");
                    return response()->json($this->response);
                }
                $permission = Permission::find($id);

                if(empty($permission)){
                    $this->prepareErrorResponse("This permission does not exist");
                    $this->response['error_value'] = $id;
                    return response()->json($this->response);
                }
                if($role->allowPermissions()->find($permission->id)){
                    array_push($not_attached, $id, "Role has this permission");
                }

                if(! ($role->allowPermissions()->find($id))){
                    $role->allowPermissions()->attach($id);
                    array_push($attached, $id);
                }
            }
        }
        elseif($request->has('names')){
            $clear_str = str_replace(" ","",$request->get('names'));
            $names = (explode(",", $clear_str));

            $attached = [];
            $not_attached = [];
            foreach ($names as $item) {
                if(!strval($item)){
                    $this->prepareErrorResponse("Some value is not a string");
                    return response()->json($this->response);
                }
                $name = $item;

                $permission = Permission::where('name', $name)->first();
                if(empty($permission)){
                    $this->prepareErrorResponse("This permission does not exist");
                    $this->response['error_value'] = $name;
                    return response()->json($this->response);
                }
                if($role->allowPermissions()->find($permission->id)){
                    array_push($not_attached, $name, "Role has this permission");
                }

                if(!($role->allowPermissions()->find($permission->id))){
                    $role->allowPermissions()->attach($permission->id);
                    array_push($attached, $name);
                }
            }
        }
        else{
            $this->prepareErrorResponse("Bad request, try ids or names");
            return response()->json($this->response);
        }

        if(empty($attached)){
            $this->prepareErrorResponse("This permissions does not attached");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse();
        $this->response['data'] = $role;
        $this->response['attached'] = $attached;
        if($not_attached){
            $this->response['not_attached'] = $not_attached;
        }
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachAllowPermissions($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('ids')){
            $clear_str = str_replace(" ","",$request->get('ids'));
            $ids = (explode(",", $clear_str));

            $detached = [];
            $not_detached = [];
            foreach ($ids as $item){
                $id = (intval($item));
                if(empty($id)||($id==null)){
                    $this->prepareErrorResponse("Look, you give bad values");
                    return response()->json($this->response);
                }
                $permission = Permission::find($id);
                if(empty($permission)||($permission == null)){
                    $this->prepareErrorResponse("Some permission does not exist");
                    $this->response['error_value'] = $id;
                    return response()->json($this->response);
                }
                if(!($role->allowPermissions()->find($permission->id))){
                    array_push($not_detached, $id, "The role does not has this permission");
                }

                if($role->allowPermissions()->find($id)){
                    $role->allowPermissions()->detach($id);
                    array_push($detached, $id);
                }
            }
        }
        elseif($request->has('names')){
            $clear_str = str_replace(" ","",$request->get('names'));
            $names = (explode(",", $clear_str));

            $detached = [];
            $not_detached = [];
            foreach ($names as $item) {
                if(!strval($item)){
                    $this->prepareErrorResponse("Some value is not a string");
                    return response()->json($this->response);
                }
                $name = $item;

                $permission = Permission::where('name', $name)->first();
                if(empty($permission)||($permission == null)){
                    $this->prepareErrorResponse("Some permission does not exist");
                    $this->response['error_value'] = $name;
                    return response()->json($this->response);
                }

                if(!($role->allowPermissions()->find($permission->id))){
                    array_push($not_detached, $name, "The role does not has this permission");
                }

                if($role->allowPermissions()->find($permission->id)){
                    $role->allowPermissions()->detach($permission->id);
                    array_push($detached, $name);
                }

            }
        }
        else{
            $this->prepareErrorResponse("Bad request, try ids or names");
            return response()->json($this->response);
        }

        if(empty($detached)){
            $this->prepareErrorResponse("This permissions does not detached");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse();
        $this->response['data'] = $role;
        $this->response['detached'] = $detached;
        if($not_detached){
            $this->response['not_detached'] = $not_detached;
        }
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachDenyPermissions($rid, Request $request){
        // TODO check if user can do this

        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('ids')){
            $clear_str = str_replace(" ","",$request->get('ids'));
            $ids = (explode(",", $clear_str));

            $attached = [];
            $not_attached = [];
            foreach ($ids as $item){
                $id = (intval($item));
                if(empty($id)||($item==null)){
                    $this->prepareErrorResponse("Undefinite values");
                    return response()->json($this->response);
                }
                $permission = Permission::find($id);

                if(empty($permission)){
                    $this->prepareErrorResponse("This permission does not exist");
                    $this->response['error_value'] = $id;
                    return response()->json($this->response);
                }
                if($role->denyPermissions()->find($permission->id)){
                    array_push($not_attached, $id, "Role has this permission");
                }

                if(! ($role->denyPermissions()->find($id))){
                    $role->denyPermissions()->attach($id);
                    array_push($attached, $id);
                }
            }
        }
        elseif($request->has('names')){
            $clear_str = str_replace(" ","",$request->get('names'));
            $names = (explode(",", $clear_str));

            $attached = [];
            $not_attached = [];
            foreach ($names as $item) {
                if(!strval($item)){
                    $this->prepareErrorResponse("Some value is not a string");
                    return response()->json($this->response);
                }
                $name = $item;

                $permission = Permission::where('name', $name)->first();
                if(empty($permission)){
                    $this->prepareErrorResponse("This permission does not exist");
                    $this->response['error_value'] = $name;
                    return response()->json($this->response);
                }
                if($role->denyPermissions()->find($permission->id)){
                    array_push($not_attached, $name, "Role has this permission");
                }

                if(!($role->denyPermissions()->find($permission->id))){
                    $role->denyPermissions()->attach($permission->id);
                    array_push($attached, $name);
                }
            }
        }
        else{
            $this->prepareErrorResponse("Bad request, try ids or names");
            return response()->json($this->response);
        }

        if(empty($attached)){
            $this->prepareErrorResponse("This permissions does not attached");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse();
        $this->response['data'] = $role;
        $this->response['attached'] = $attached;
        if($not_attached){
            $this->response['not_attached'] = $not_attached;
        }
        return response()->json($this->response);
    }

    /**
     * @param $rid
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachDenyPermissions($rid, Request $request){
        // TODO check if user can do this
        if ( ! (is_numeric($rid) && $rid == intval($rid) && intval($rid)>0) ){
            $this->prepareErrorResponse("You must set integer user id");
            return response()->json($this->response);
        }

        $role = Role::find($rid);
        if( ! $role){
            $this->prepareErrorResponse("Role doesn't exist");
            return response()->json($this->response);
        }

        if(empty($request)){
            $this->prepareErrorResponse("Request is empty");
            return response()->json($this->response);
        }

        if($request->has('ids')){
            $clear_str = str_replace(" ","",$request->get('ids'));
            $ids = (explode(",", $clear_str));

            $detached = [];
            $not_detached = [];
            foreach ($ids as $item){
                $id = (intval($item));
                if(empty($id)||($id==null)){
                    $this->prepareErrorResponse("Look, you give bad values");
                    return response()->json($this->response);
                }
                $permission = Permission::find($id);
                if(empty($permission)||($permission == null)){
                    $this->prepareErrorResponse("Some permission does not exist");
                    $this->response['error_value'] = $id;
                    return response()->json($this->response);
                }
                if(!($role->denyPermissions()->find($permission->id))){
                    array_push($not_detached, $id, "The role does not has this permission");
                }

                if($role->denyPermissions()->find($id)){
                    $role->denyPermissions()->detach($id);
                    array_push($detached, $id);
                }
            }
        }
        elseif($request->has('names')){
            $clear_str = str_replace(" ","",$request->get('names'));
            $names = (explode(",", $clear_str));

            $detached = [];
            $not_detached = [];
            foreach ($names as $item) {
                if(!strval($item)){
                    $this->prepareErrorResponse("Some value is not a string");
                    return response()->json($this->response);
                }
                $name = $item;

                $permission = Permission::where('name', $name)->first();
                if(empty($permission)||($permission == null)){
                    $this->prepareErrorResponse("Some permission does not exist");
                    $this->response['error_value'] = $name;
                    return response()->json($this->response);
                }

                if(!($role->denyPermissions()->find($permission->id))){
                    array_push($not_detached, $name, "The role does not has this permission");
                }

                if($role->denyPermissions()->find($permission->id)){
                    $role->denyPermissions()->detach($permission->id);
                    array_push($detached, $name);
                }

            }
        }
        else{
            $this->prepareErrorResponse("Bad request, try ids or names");
            return response()->json($this->response);
        }

        if(empty($detached)){
            $this->prepareErrorResponse("This permissions does not detached");
            return response()->json($this->response);
        }

        $this->prepareSuccessResponse();
        $this->response['data'] = $role;
        $this->response['detached'] = $detached;
        if($not_detached){
            $this->response['not_detached'] = $not_detached;
        }
        return response()->json($this->response);
    }




}
