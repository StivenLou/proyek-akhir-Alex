<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Membuat attribute Name
    private $nrp = '191014034';
    private $name = 'Alexander S. M';
    private $course = 'P WEB 2';
    private $task;
    private $quiz;
    private $mid_term;
    private $final;
    private $grade;

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

    // method dengan 2 argumen
    public function myCourse($task, $quiz, $mid_term, $final) {
        $this->task = $task;
        $this->quiz = $quiz;
        $this->mid_term = $mid_term;
        $this->final = $final;
        $grade = $this->calculateGrade();

        return view('person.my-academic', compact('task', 'quiz', 'grade', 'mid_term', 'final'));
    }

    protected $casts = [
        'grade' => 'double',
    ];

    // kalkulasi
    private function calculateGrade() {
        $grade = (($this->task * 0.1) + ($this->quiz * 0.1) + ($this->mid_term * 0.3) + ($this->final * 0.5));

        return $grade;
    }

    // Create
    public function create() {
        return view('person.create');
    }

    // Untuk menerima inputan dari Form
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email'
        ]);
        $person = $request;
        return view('person.print', compact('person'));
    }
}
