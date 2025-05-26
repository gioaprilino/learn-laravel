<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticable implements MustVerifyEmail
{
    use HasFactory, Notifiable;


    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}
