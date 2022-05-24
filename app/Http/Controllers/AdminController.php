<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{    
    public function __construct() {
        Log::debug('CONTROLLER_CALL: AdminController called');
        $this->middleware('can:isAdmin');
    }

    public function index() {
        return view('admin');
    }
}
