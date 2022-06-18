<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {

        return view(

            'pengiriman.pengiriman'
        );
    }
}
