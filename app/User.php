<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public function company(){
        //return $this->belongsTo('App\Category');
        return $this->belongsTo('App\Company');
    }
    
    function getPaginateByLimit(int $limit_count = 20)
    {
        return $this::with('company')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function talks()
    {
        return $this->hasMany('App\Talk');
    }
    
    public function getByuser(int $limit_count = 5)
    {
        return $this->talks()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id', 'gender', 'age',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
