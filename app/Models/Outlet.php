<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'tb_outlet';
    public $timestamps = false;

    public function paket()
    {
    	return $this->hasMany(Paket::class, 'id_outlet');
    }

    public function user()
    {
    	return $this->hasMany(User::class, 'id_outlet');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_outlet');
    }
}
