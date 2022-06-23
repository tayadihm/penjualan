<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $primaryKey = 'no_psn';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "pemesanan";
    protected $fillable=['no_psn','tgl_psn','nm_cust','tgl_tempo' , 'total'];

    public function detail() {
        return $this->belongsTo('App\DetailPesan');
    }
}
