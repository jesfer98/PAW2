<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Post;

class mensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function neoCh(Request $request)
    {

        $this->validate($request,[
            'texto' => ['required', 'string', 'max:255'],
            ]);


        DB::table('chat')->insert(
            ['usuario1' => $request->get('idAut'), 'usuario2' => $request->get('idUsu')]
        );

        $chat = DB::table('chat')->select('idchat')
        ->where([['chat.usuario1', '=', $request->get('idAut')],['chat.usuario2', '=', $request->get('idUsu')]])
        ->orWhere( [['chat.usuario2', '=', $request->get('idAut')],['chat.usuario1', '=', $request->get('idUsu')]])
        ->get();

        DB::table('mensajes')->insert(
            ['id_env' => $request->get('idAut'), 'idchat' => $chat->get(0)->idchat,'texto'=>$request->get('texto')]
        );

        $contenido = DB::table('contenidos')->where('usuario', $request->get('idUsu'))->where('estado', '1')->get();
           
        $mensaje = DB::table('mensajes')
            ->join('chat',  'mensajes.idchat','=','chat.idchat')
            ->where([['chat.usuario1', '=', $request->get('idUsu')],['chat.usuario2', '=', $request->get('idAut')]])
            ->orWhere( [['chat.usuario2', '=', $request->get('idUsu')],['chat.usuario1', '=', $request->get('idAut')]])
            ->select('mensajes.texto','mensajes.idchat','mensajes.id_env')
            ->get();

        $user=   DB::table('users')->where('id', $request->get('idUsu'))->get();


        $chat= DB::table('chat')
        ->where([['chat.usuario1', '=', $request->get('idUsu')],['chat.usuario2', '=', $request->get('idAut')]])
        ->orWhere( [['chat.usuario2', '=', $request->get('idUsu')],['chat.usuario1', '=', $request->get('idAut')]])
    ->select('idchat')
    ->get();

    $user=   DB::table('users')->where('id', $request->get('custId'))->get();

   // return redirect()->route('SM')->with(['contenido' => $contenido, 'mensaje'=>$mensaje,'user'=>$user,'chat'=>$chat]);
   return view('visita', ['contenido' => $contenido, 'mensaje'=>$mensaje,'user'=>$user,'chat'=>$chat]);



    
    
    }

    public function neoMj(Request $request)
    {

        $this->validate($request,[
            'texto' => ['required', 'string', 'max:255'],
            ]);


       

       
        DB::table('mensajes')->insert(
            ['id_env' => $request->get('idAut'), 'idchat' => $request->get('chat'),'texto'=>$request->get('texto')]
        );

        $contenido = DB::table('contenidos')->where('usuario', $request->get('idUsu'))->where('estado', '1')->get();
           
        $mensaje = DB::table('mensajes')
            ->join('chat',  'mensajes.idchat','=','chat.idchat')
            ->where([['chat.usuario1', '=', $request->get('idUsu')],['chat.usuario2', '=', $request->get('idAut')]])
            ->orWhere( [['chat.usuario2', '=', $request->get('idUsu')],['chat.usuario1', '=', $request->get('idAut')]])
            ->select('mensajes.texto','mensajes.idchat','mensajes.id_env')
            ->get();

        $user=   DB::table('users')->where('id', $request->get('idUsu'))->get();

        $chat= DB::table('chat')
        ->where([['chat.usuario1', '=', $request->get('idUsu')],['chat.usuario2', '=', $request->get('idAut')]])
        ->orWhere( [['chat.usuario2', '=', $request->get('idUsu')],['chat.usuario1', '=', $request->get('idAut')]])
    ->select('idchat')
    ->get();


    return view('visita', ['contenido' => $contenido, 'mensaje'=>$mensaje,'user'=>$user,'chat'=>$chat]);


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

    public function shoM(Request $request){
            $contenido = DB::table('contenidos')->where('usuario', $request->get('idUsu'))->where('estado', '1')->get();
           
            $mensaje = DB::table('mensajes')
                ->join('chat',  'mensajes.idchat','=','chat.idchat')
                ->where([
                    ['chat.usuario1', '=', $request->get('idUsu')],['chat.usuario2', '=', $request->get('idAut')]])
                ->orWhere( [['chat.usuario2', '=', $request->get('idUsu')],['chat.usuario1', '=', $request->get('idAut')]])
                ->select('mensajes.texto','mensajes.idchat','mensajes.id_env')
                ->get();

            $user=   DB::table('users')->where('id', $request->get('idUsu'))->get();


            return view('visita', ['contenido' => $contenido, 'mensaje'=>$mensaje,'user'=>$user]);
    }


   

    public function mensPR(Request $request)
    {
        $this->validate($request,[
            'texto' => ['required', 'string', 'max:255'],
            ]);


       

       
        DB::table('mensajes')->insert(
            ['id_env' => $request->get('idAut'), 'idchat' => $request->get('chat'),'texto'=>$request->get('texto')]
        );

        return redirect()->route('usu');
    }
}
