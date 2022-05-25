<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatoreController extends Controller
{
    public function __construct() {
        // Log::debug('CONTROLLER_CALL: LocatoreController called');
        $this->middleware('can:isLocatore');
    }

    public function index() {
        return view('locatore');
    }}
