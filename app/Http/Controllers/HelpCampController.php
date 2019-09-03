<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\User;
use Illuminate\Http\Request;

class HelpCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //$request->user()->authorizeRoles('admin');
      $servicio = Servicio::all();
      //compact genera un array con toda la informacion que le damos
      return view('servicio.index',compact('servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //se crea una variable que se le va a asignar la instancia del modelo "servicio"


        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$name);

            $p_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $slug = substr(str_shuffle($p_chars),0,4);

        }
        $servicio = new Servicio();
        $servicio->name = $request->input('name');
        $servicio->precio = $request->input('precio');
        $servicio->fechai = $request->input('fechai');
        $servicio->fechac = $request->input('fechac');
        $servicio->imagen = $name;
        $servicio->descripcion = $request->input('descripcion');
        $servicio->slug = $slug;

        $servicio->save();

        return redirect()->route('servicio.index');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Servicio $servicio)
    {
        if ($request->user()->authorizeRoles('admin')) {
            return view('servicio.showd',compact('servicio'));

        }elseif($request->user()->authorizeRoles('user')) {
            return view('servicio.show',compact('servicio'));
        }else{
            return view('servicio.show',compact('servicio'));
        }


       //$servicio = Servicio::find($servicio);

      //return $servicio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
       // $servicio = Servicio::all();
        //$servicio = Servicio::find($servicio);
        return view('servicio.edit',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Servicio $servicio)
    {
        $servicio->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $servicio->imagen = $name;
            $file->move(public_path().'/img/',$name);




    }
        $servicio->save();
        //en este caso si no se coloca el parametro dara un erro
        //enviarle un objeto el cual ahorita es trainer
        //session data
        //con with se va a enviar datos a la vista
        //se le va a pasar una variable status q va a guardar el status y el mensanje
        // return redirect()->route('crud.show',[$servicio])->with('status','Perfil actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $file_path = public_path().'/img/'.$servicio->imagen;
        \File::delete($file_path);
        $servicio->delete();
        //return 'El usuario'.$servicio->name.'se ha eliminado con exito';
        return redirect()->route('servicio.index');
    }
}
