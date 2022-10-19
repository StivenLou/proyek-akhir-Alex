<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Membuat attribute Name
    private $name = "Alexander Steven Marselinus";

    //Membuat Method Index
    public function index() {
        //Mengembalikan nilai attribute name
        return $this->name;
    }

    //Parsing data
    public function show($param) {
        //Merubah Attribute name
        $this->name = $param;
        return $this->name;
    }
}
