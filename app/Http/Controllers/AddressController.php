<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    function index()
    {
        $addresses = \App\Models\Address::with('user')->get();
        return response()->json($addresses);
    }
}
