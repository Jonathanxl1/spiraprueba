@extends('layout')
@section('title', 'Spira Prueba - Actualizar Estudiantes')
@section('content')
	
	<update token="{{ csrf_token() }}" id="{{$id}}" ></update>
@endsection