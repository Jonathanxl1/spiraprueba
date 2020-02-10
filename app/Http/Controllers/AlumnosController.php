<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\alumnos_cursos;
use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Alumnos $alumnos)
    {
        return $alumnos::with('Cursos')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* Valida la informacion del post*/
            $data = $request->validate([
                "name"=>"required|unique:alumnos,name|max:100",
                "email"=>"bail|required|unique:alumnos,email|max:100",
                "phone"=>"max:12",
                "course"=>"exists:cursos,id_curso"
            ]);
        
            $alumno = new Alumnos;
                      
        

         /* Se insertan datos en la tabla Alumnos y recuperamos el id*/   
            $id = $alumno->insertGetId([
                "name"=>$data['name'],
                "email"=> $data['email'],
                "phone"=>$data['phone'],
                "created_at"=>date('Y-m-d G:i:s'),
                "updated_at"=>date('Y-m-d G:i:s'),
 
            ]);


           
            $alumno->Cursos()->attach($data['course'],["id_alumno"=>$id]);
           
            
             response('Alumno Registrado',201);
            

            return redirect('/');
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
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function read(Alumnos $alumnos,$id)
    {
                $alumno=$alumnos::with('Cursos')->find($id);
               if(!empty($alumno)){
                    return $alumno;
               }else{
                    return response('Not Found',404);
               }

      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumnos $alumnos,$id)
    {
           
        if($alumnos::find($id) != null){
            $alumno = $alumnos::find($id);
                       
             return view('edit',[
                "id"=>$id,
            ]); 

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumnos $alumnos,$id)
    {
            /*Valida que no haya registro repetidos omitiendo el propio*/

            $form = $request->validate([
                "name"=>[Rule::unique('alumnos','name')->ignore($id,'id_alumno'),'required','max:100'],
                "email"=>[Rule::unique('alumnos','email')->ignore($id,'id_alumno'),'required','max:100'],
                "phone"=>"max:12",
                "course"=>"exists:cursos,id_curso"
            ]);

            $updated_alum =$alumnos::find($id);
            
            
            $updated_alum->name = $form['name'];
            $updated_alum->email = $form['email'];
            $updated_alum->phone = $form['phone'];
            $updated_alum->save();
            $updated_alum->Cursos()->attach($form['course'],["id_alumno" =>$id]);

            return response('Alumnos Actualizado',204);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function delete(Alumnos $alumnos,$id)
    {
        if($alumnos::find($id) != null){
            $alumno = $alumnos::find($id);
            $alumno->Cursos()->detach();
            $alumno->delete();
            
            return response('No Resource',204);
        }
    }


}
