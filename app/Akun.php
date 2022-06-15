<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    //jika tidak di definisikan, maka primary akan terdetek id
    protected $primaryKey = 'kd_akun';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "akun";
    protected $fillable=['kd_akun','nm_akun'];
}
