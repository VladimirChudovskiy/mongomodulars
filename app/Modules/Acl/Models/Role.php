<?php

namespace App\Modules\Acl\Models;

use App\Modules\I18n\Traits\TranslateProperty;
use Moloquent\Eloquent\Model;

class Role extends Model
{
    use TranslateProperty;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\User',
            'user_role');
    }

    public function allowPermissions()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\Permission',
            'role_allow_permission');
    }
    public function denyPermissions()
    {
        return $this->belongsToMany('App\Modules\Acl\Models\Permission',
            'role_deny_permission');
    }

}
