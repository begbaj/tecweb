<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Resources\Alloggio;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class LocatarioController extends Controller
{
    public function __construct() {
        $this->middleware('can:isLocatario');
    }

    public function index() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
        return view('locatario')
            ->with('accomodations', $accomodations);
    }

    public function search(Request $filters) {
        Log::debug('LOCATARIO CIAO');

        $this->_accomodations = new Catalog;
        $accomodations = $this->_accomodations->search($filters);
        return view('locatario')
            ->with('accomodations', $accomodations);
    }
}
