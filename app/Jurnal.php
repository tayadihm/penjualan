<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    //jika tidak di definisikan, maka primary akan terdetek id
    protected $primaryKey = 'no_jurnal';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "jurnal";
    protected $fillable=['no_jurnal','tgl_jurnal','no_psn','tgl_psn','kd_akun','nm_akun','debet','kredit'];
}
