<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $primaryKey = 'no_pesan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "pemesanan";
    protected $fillable=['no_psn','tgl_psn','idcust' , 'tgl_tempo' , 'total'];
}
