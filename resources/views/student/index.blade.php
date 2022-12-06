@extends('layouts.main')


@section('first-content')

@foreach($students as $student)
    <p>Nama : {{ $student->name }}</p><br />
    <p>NRP : {{ $student->code }}</p><br />
    <p>Kelas : {{ $student->group }}</p><br />

@endforeach

@endsection

