<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatoreController extends Controller
{
    public function __construct() {
        $this->middleware('can:isLocatore');
    }

    public function index() {
        return view('locatore');
    }}
