<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $primaryKey = 'no_kirim';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "pengiriman";
    protected $fillable=['no_kirim','tgl_kirim','no_psn','nm_cust','alamat','driver'];
}
