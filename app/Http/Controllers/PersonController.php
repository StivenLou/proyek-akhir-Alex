<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Membuat attribute Name
    private $nrp;
    private $name;

    //Membuat Method Index
    public function index() {
        //Mengembalikan nilai attribute name
        return view("person.index");
    }

    public function sendData() {
        $nrp = $this->nrp;
        $name = $this->name;

        return view("person.sendData", compact("nrp", "name"));
    }

    //Parsing data
    public function show($param) {
        //Merubah Attribute name
        $this->name = $param;
        return $this->name;
    }

    //Blade
    public function data() {
        $names = ["ana", "banu", "cecep", "dadang", "entis"];

        return view("person.data", ['names' => $names]);
    }

    //method dengan 2 argumen
    public function data() {
        $code = ["191014034"];
        $names = ["Alexander Steven Marselinus"];
        $course = ["Alexander Steven Marselinus"];
        $names = ["Alexander Steven Marselinus"];
        $names = ["Alexander Steven Marselinus"];
        $names = ["Alexander Steven Marselinus"];

        return view("person.data", ['names' => $names]);
    }
}
