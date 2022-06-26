<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesan extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "detail_pesan";
    protected $fillable=['no_psn','kd_brg','nm_brg','qty_pesan','sub_total'];

    public function pemesanan() {
        return $this->hasOne('App\Pemesanan');
    }
}
