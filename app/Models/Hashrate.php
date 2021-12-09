<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashrate extends Model
{
    use HasFactory;

    public $primaryKey = 'id_hashrate';

    protected $table = 'tb_hashrate';

    protected $fillable = [
        'id_device','hashrate','algo','watt','blockreward','difficulity'
    ];

    public function device()
    {
        return $this->hasOne('\App\Models\Devices','id_device','id_device');
    }
}
