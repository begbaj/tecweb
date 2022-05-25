<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocatarioController extends Controller
{
    public function __construct() {
        Log::debug('CONTROLLER_CALL: LocatarioController called');
        $this->middleware('can:isLocatario');
    }

    public function index() {
        return view('locatario');
    }}
