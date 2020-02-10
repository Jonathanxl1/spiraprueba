@extends('layout')
@section('title', 'Spira Prueba - Home')
@section('content')
	<viewAlumnos token="{{ csrf_token() }}" api="{{ route('alumnos') }}"></viewAlumnos>
@endsection