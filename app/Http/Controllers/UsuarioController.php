<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Validator;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;
use DB;
use Hash;



class UsuarioController extends Controller
{
  

    public function index(Request $request)
    {
        $usuarios = Usuario::orderBy('id','asc')->paginate(5);
        return view('mantenedor',compact('usuarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('nuevo');
    }


    public function store(Request $request)
    {

         /* dd($request); */
 
                $validator = Validator::make($request->all(), [
                        'nombre' => 'required|alpha_spaces|min:4', /* validacion de nonbre requerido solo palabras y espacios, con validación personalizada alpha_spaces con un minimo de 4 caracteres */
                        'ape_paterno' => 'required|alpha_spaces|min:4',
                        'ape_materno' => 'required|alpha_spaces|min:4',
                        'rut' => ['required', 'string', new ValidChileanRut(new ChileRut), 'unique:usuarios,rut'], /* utilizo validación de rut con  libreria malahierba-lab/chile-rut permitiendo solo rut validos (todas las opciones de codigo verificador ejm: 11111111-k), con 3 tipos de formatos con separador de miles y con guión,
                        sin separador de miles y con guión,sin separador de miles y sin guión, y porsupuesto requerido, con valor unico en la base de datos para no obtener otro usuario con el mismo rut y validado*/
                        'fecha_nac' => 'required',
                        'email' => 'required|unique:usuarios,email|email|max:255', /* email unico en la bd con un maximo de caracteres y debe tener el formato email@gmail.com */
                        'password' => 'required|min:4',
                        'imagen' => 'required|image|mimes:jpeg|dimensions:max_width=200,max_height=200', /* requerido, debe ser del tipo image, solo el formato jpeg como se solicito, max dimensiones 200x200px */
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }

         
            if ($validator->passes()) {

                if($request->hasFile('imagen')){
                    $file = $request->file('imagen');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/',$name);
               
        
                        $usuario = new Usuario();
                        $usuario->nombre = $request->input('nombre');
                        $usuario->ape_paterno = $request->input('ape_paterno');
                        $usuario->ape_materno = $request->input('ape_materno');
                        $usuario->rut = $request->input('rut');
                        $usuario->fecha_nac = $request->input('fecha_nac');
                        $usuario->email = $request->input('email');
                        $usuario->password = $request->input('password');
                        $usuario->imagen = $name;
                    
                        $usuario->save();

                        return Response()->json(["success"=>"Usuario creado exitosamente.!"]);
        
                    }
            }
            
           
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = Usuario::find($id);


        return view('editar',compact('usuarios'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        /* dd($request); */

        $usuarios = Usuario::find($request['id']);


        $this->validate($request, [
            'nombre' => 'required|alpha_spaces|min:4',
            'ape_paterno' => 'required|alpha_spaces|min:4',
            'ape_materno' => 'required|alpha_spaces|min:4',
            'rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],
            'fecha_nac' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:4',
            'imagen' => 'mimes:jpeg|dimensions:max_width=200,max_height=200',
        ]);

   

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        
       
        $name = time().$file->getClientOriginalName();

    /*     dd($name); */

        $datos= [
            'nombre'      => $request['nombre'],
            'ape_paterno' => $request['ape_paterno'],
            'ape_materno' => $request['ape_materno'],
            'rut'         => $request['rut'],
            'fecha_nac'   => $request['fecha_nac'],
            'email'       => $request['email'],
            'password'    => $request['password'],
            'imagen'      => $name, 
        ];
         
        $usuarios->update($datos);
    } else {

        $datos= [
            'nombre'      => $request['nombre'],
            'ape_paterno' => $request['ape_paterno'],
            'ape_materno' => $request['ape_materno'],
            'rut'         => $request['rut'],
            'fecha_nac'   => $request['fecha_nac'],
            'email'       => $request['email'],
            'password'    => $request['password'],
            
        ];

        $usuarios->update($datos);
    }
        $usuarios = Usuario::orderBy('id','asc')->paginate(10);
        \Session::flash('flash_message', 'Registro editado correctamente!');
        /* Utilizo redirect() para evitar el dubplicado de datos al recargar pagina*/
        return redirect()->route('index', ['usuarios' => $usuarios]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->delete(); /* eliminación de usuario por id y envio mensaje de confirmación de la eliminación por session capturado en la vista del mantenedor */
        \Session::flash('flash_message', 'Registro eliminado correctamente!');
        return redirect()->route('index');
    }
}