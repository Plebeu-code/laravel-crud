<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'cpf', 'email');
    protected $with = ['profiles', 'address'];
    public function address()
    {
        return $this->belongsToMany(
            Address::class,
            'addresses_user'
        );
    }
    public function profiles()
    {
        return $this->belongsToMany(
            Profile::class,
            'profiles_users'
        );
    }
}
