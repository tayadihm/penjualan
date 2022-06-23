<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfterBayar extends Model
{
    protected $primaryKey = 'no_psn';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "after_bayar";
    protected $fillable=['no_bayar','no_faktur','no_psn','tgl_psn','tgl_bayar','jml_bayar'];
}
