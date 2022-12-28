<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'total_harga', 'transaksi_code'
    ];
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->transaksi_code = $model->getRandomString();
        });
    }
    public function generateRandomString($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . "" . date("YmdHis");
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }
    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'id_transaksi');
    }
}
