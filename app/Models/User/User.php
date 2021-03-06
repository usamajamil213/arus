<?php

namespace App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
     public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
         }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
    public function certificate(){
        return $this->hasMany('App\Models\Provider\ProviderCertificate','provider_id','id');
    }
    public function company(){
        return $this->hasone('App\Models\Company\Company','id','company_id');
    }
    public function state(){
        return $this->hasone('App\Models\Company\State','id','state_id');
    }
    public function provider_skill(){
        return $this->hasMany('App\Models\Provider\ProviderSkill','provider_id','id');

    }
    public function provider_rating(){
        return $this->hasMany('App\Models\Provider\ProviderRating','provider_id','id');
    }
    public function rating(){
        return $this->hasMany('App\Models\Provider\ProviderRating','provider_id','id')->avg('rating')->orderBy('rating');
    }
    
}
