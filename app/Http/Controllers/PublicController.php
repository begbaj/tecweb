<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class PublicController extends Controlelr {
    
    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }

    public function showCatalogDummy() {
        $insertion = $this->catalogModel->dummyData();
        return view('catalog')
            ->with('data', $insertion);
    }
}
