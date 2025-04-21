<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosenti extends Model
{
    //
    protected $fillable = ['nama', 'nip', 'email', 'nohp', 'alamat', 'bidang'];
    use SoftDeletes;
}
