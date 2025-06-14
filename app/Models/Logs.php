<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    /** @use HasFactory<\Database\Factories\LogsFactory> */
    use HasFactory;
    protected $table = 'logs';
    protected $primaryKey = 'id_logs';
    protected $fillable = ['log'];
    public $timestamps = false;
}
