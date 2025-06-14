<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TblUser extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\TblUserFactory> */
    use HasFactory;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username','password','role'];
    public $timestamps = false;
    protected $hidden = ['password'];
}
