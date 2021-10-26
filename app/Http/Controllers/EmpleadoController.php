<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
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
         $datosEmpleado=$request->except('_token');
         if($request->hasFile('imagen')){

            $datosEmpleado['imagen']=$request->file('imagen')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);
        //return response()->json($datosEmpleado);
        return redirect('/empleados')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $datosEmpleado=$request->except('_token', '_method');

//return $request;
      if($request->hasFile('imagen')){
          $empleado=Empleado::findOrFail($id);
          Storage::delete('public/'.$empleado->imagen);
            $datosEmpleado['imagen']=$request->file('imagen')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));

/*
        if($request->hasFile('imagen')){

           $datosEmpleado['imagen']=$request->file('imagen')->store('uploads', 'public');
       }

       Empleado::insert($datosEmpleado);
       return response()->json($datosEmpleado);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


            $empleado=Empleado::findOrFail($id);
           if( Storage::delete('public/'.$empleado->imagen)){
                  Empleado::destroy($id);
           }
             // $datosEmpleado['imagen']=$request->file('imagen')->store('uploads', 'public');



       // Empleado::delete($empleado);



        return redirect('empleados');
    }
}
