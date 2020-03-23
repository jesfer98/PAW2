<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Post;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function ind2()
    {
        //

        $users = DB::table('users')->get();

     //   $contenidos= DB::table('contenidos')->get();

        $contenidos = DB::table('contenidos')
            ->join('categoria', 'categoria.idcategoria', '=', 'contenidos.categoria')
            ->select('contenidos.*', 'categoria.nombreC')
            ->get();

            $mensaje = DB::table('mensajes')
            ->join('chat as c',  'mensajes.idchat','=','c.idchat')
            ->join('users as u1','u1.id','=','c.usuario1')
            ->join('users as u2','u2.id','=','c.usuario2')
      //      ->where([['chat.usuario1', '=', $request->get('custId')],['chat.usuario2', '=', $request->get('autid')]])
      //      ->orWhere( [['chat.usuario2', '=', $request->get('custId')],['chat.usuario1', '=', $request->get('autid')]])
            ->select('mensajes.texto','mensajes.idmensaje as id','mensajes.idchat','mensajes.id_env','u1.id as u1id','u1.name as u1nombre','u1.apellido as u1apellido' ,'u2.id as u2id','u2.name as  u2nombre','u2.apellido as u2apellido')
            ->get();


        
 

            $chat=DB::table('chat')
            ->join('users as u1','u1.id','=','chat.usuario1')
            ->join('users as u2','u2.id','=','chat.usuario2')
            ->select('chat.idchat','u1.id as u1id','u1.nick as u1nick','u2.id as u2id','u2.nick as  u2nick')
            ->get();



        return view('/perfil', ['users' => $users,'contenidos'=>$contenidos,'chat'=>$chat,'mensaje'=>$mensaje]);
        


      //  $contenido = DB::table('users')->where('usuario', $request->get('custId'))->get();
        //return view('visita', compact('contenido'));
 
        

           // $users = DB::table('users')->where('name', 'pass')->first();

           // return view('/perfil',compact('users'));
            //echo $user->name;

    }

    public function ind3()
    {
        //

        $users = User::all()->toArray();
      
     
         return view('/usuarios', compact('users'));

           // $users = DB::table('users')->where('name', 'pass')->first();

           // return view('/perfil',compact('users'));
            //echo $user->name;

    }

    public function uploimg($id, Request $request)
    {
    

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
        $post=Post::create($request->all());
     
        $rules = ['file' => 'mimes:jpg,jpeg,png'];

        $post->fill($request->all())->save();
 
                 if($request->file('file')){
                     $path=Storage::disk('public')->put('image',$request->file('file'));
                     $post->fill(['file'=> asset($path)])->save();    
                 }
                 return view('usu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
           'telefono' => ['nullable','numeric', 'min:11'],
           'direccion' => ['nullable', 'string', 'max:255'],

            ]);
//;
//echo $request->all();


                //  $user=User::find($id);
      



                    $user = DB::table('users')
                                ->where('id', $request->get('IdPr'))
                                ->update(['name' => $request->get('name'),
                                     'apellido' => $request->get('apellido'),
                                     'nick' => $request->get('nick'),
                                     'email' => $request->get('email'),
                                   
                                     'telefono' => $request->get('telefono'),
                                     'direccion' => $request->get('direccion'),
                                     
                                     
                                     ]);
                //    $user->save();

       return redirect()->route('usu')->with('success','Data update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
