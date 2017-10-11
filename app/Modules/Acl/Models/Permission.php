<?php

namespace App\Modules\Acl\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Moloquent\Eloquent\Model;

class Permission extends Model
{
    use TranslateProperty;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resource', 'action', 'mode',
        'name', 'description'
    ];

    public function usersAllowPerm()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\User',
            'user_allow_permission');
    }

    public function usersDenyPerm()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\User',
            'user_deny_permission');
    }

    public function rolesAllowPerm()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\Role',
            'role_allow_permission');
    }
    public function rolesDenyPerm()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\Role',
            'role_deny_permission');
    }

}
