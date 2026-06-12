<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['username', 'password', 'fullname', 'email', 'phone', 'role_id', 'created_at', 'updated_at]'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{

    protected $dates = ['deleted_at'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    use HasFactory, Notifiable, SoftDeletes;

}
