<?php

namespace App\Http\Controllers;

use App\alumnos_cursos;
use Illuminate\Http\Request;

class AlumnosCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(alumnos_cursos $alumnos_cursos)
    {
        return $alumnos_cursos->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\alumnos_cursos  $alumnos_cursos
     * @return \Illuminate\Http\Response
     */
    public function show(alumnos_cursos $alumnos_cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alumnos_cursos  $alumnos_cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnos_cursos $alumnos_cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alumnos_cursos  $alumnos_cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumnos_cursos $alumnos_cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alumnos_cursos  $alumnos_cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumnos_cursos $alumnos_cursos)
    {
        //
    }
}
