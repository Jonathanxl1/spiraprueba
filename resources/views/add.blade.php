@extends('layout')
@section('title', 'Spira Prueba - Agregar Estudiantes')
@section('content')
	
	<edit token="{{ csrf_token() }}" route="{{ route('add') }}"></edit>
@endsection
