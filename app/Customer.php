<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //jika tidak di definisikan, maka primary akan terdetek id
    protected $primaryKey = 'idcust';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "customer";
    protected $fillable=['idcust','cust','nohp' , 'email' ,'alamat'];
}
