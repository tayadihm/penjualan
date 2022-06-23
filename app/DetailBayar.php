<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBayar extends Model
{
    protected $primaryKey = 'no_bayar';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detail_bayar";
    protected $fillable=['no_bayar','kd_brg','qty_bayar','sub_bayar',];
}
