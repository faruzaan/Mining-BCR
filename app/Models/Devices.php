<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    public $primaryKey = 'id_device';

    protected $table = 'tb_devices';

    protected $fillable = [
        'brand','nama_device'
    ];
}
