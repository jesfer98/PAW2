<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Farcades\Storage;

use App\Contenido;

use Illuminate\Support\Facades\DB;

class ContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('producto');
    }

    public function busca(Request $request){
        
        if($request->get('search')==null){
        $contenido = DB::table('contenidos')
        ->join('categoria', 'contenidos.categoria', '=', 'categoria.idcategoria')
        ->select('contenidos.nombre as nombre', 'contenidos.descripcion as descripcion','contenidos.idcontenido as id','categoria.nombreC as categoria','contenidos.val_pos','contenidos.val_neg')
        ->where('usuario', '<>', $request->get('custId'))
        ->where('estado', '1')
        ->get();
        }
        else{$contenido = DB::table('contenidos')
            ->join('categoria', 'contenidos.categoria', '=', 'categoria.idcategoria')
            ->select('contenidos.nombre as nombre', 'contenidos.descripcion as descripcion','contenidos.idcontenido as id','categoria.nombreC as categoria','contenidos.val_pos','contenidos.val_neg')
            ->where([['usuario', '<>', $request->get('custId')],['estado', '1'],['nombre', $request->get('search')]])
            ->orWhere([['usuario', '<>', $request->get('custId')],['estado', '1'],['descripcion', $request->get('search')]])
            ->orWhere([['usuario', '<>', $request->get('custId')],['estado', '1'],['categoria.nombre', $request->get('search')]])
            ->get();}

        return view('buscador', ['contenido' => $contenido]);
    }

    public function most(Request $request)
    {
        //
       // $contenido = Contenido::all()->toArray();
      //  return view('vista', compact('contenido'));

       $contenido = DB::table('contenidos')->where('usuario', $request->get('custId'))->where('estado', '1')->get();
       //return view('visita', compact('contenido'));
     //  $mensaje = DB::table('mensajes')->where('usuario', $request->get('custId'))->where('estado', '1')->get();

       $mensaje = DB::table('mensajes')
            ->join('chat',  'mensajes.idchat','=','chat.idchat')
            ->where([
                ['chat.usuario1', '=', $request->get('custId')],['chat.usuario2', '=', $request->get('autid')]])
            ->orWhere( [['chat.usuario2', '=', $request->get('custId')],['chat.usuario1', '=', $request->get('autid')]])
            ->select('mensajes.texto','mensajes.idchat','mensajes.id_env')
            ->get();

        $chat= DB::table('chat')
            ->where([ ['chat.usuario1', '=', $request->get('custId')],['chat.usuario2', '=', $request->get('autid')]])
        ->orWhere( [['chat.usuario2', '=', $request->get('custId')],['chat.usuario1', '=', $request->get('autid')]])
        ->select('idchat')
        ->get();

        $user=   DB::table('users')->where('id', $request->get('custId'))->get();


       return view('visita', ['contenido' => $contenido, 'mensaje'=>$mensaje,'user'=>$user,'chat'=>$chat]);
    }

    public function most2(Request $request)
    {
        //
       // $contenido = Contenido::all()->toArray();
      //  return view('vista', compact('contenido'));

       $contenido = DB::table('contenidos')->where('usuario', $request->get('custId'))->where('estado', '1')->get();
       //return view('visita', compact('contenido'));
     //  $mensaje = DB::table('mensajes')->where('usuario', $request->get('custId'))->where('estado', '1')->get();

      

        $user=   DB::table('users')->where('id', $request->get('custId'))->get();


       return view('visita', ['contenido' => $contenido,'user'=>$user]);
    }




    public function paraed(Request $request)
    {
        //
       // $contenido = Contenido::all()->toArray();
      //  return view('vista', compact('contenido'));



       $contenido = DB::table('contenidos')->where('idcontenido', $request->get('custId'))->select('idcontenido as id', 'nombre','categoria','descripcion')->get();
       //return view('visita', compact('contenido'));

       return view('editorProd', ['contenido' => $contenido]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    
            $this->validate( $request, [
                'nombre'=>'required',

                'descripcion'=>'nullable',
                'categoria'=>['required','numeric'],
                'usuario'=>'nullable',
                'val_pos'=>'nullable',
                'val_neg'=>'nullable',
                'estado'=>'nullable'
            ]);
            $contenido = new Contenido([
                'nombre'=> $request->get('nombre'),
                
                'descripcion'=>$request->get('descripcion'),
                'categoria'=>$request->get('categoria'),
                'usuario'=>$request->get('custId'),
                'val_pos'=>$request->get('val_pos'),
                'val_neg'=>$request->get('val_neg'),
                'estado'=>$request->get('estado'),
                
            ]);

            $contenido->save();

              
            return redirect()->route('prd')->with('success',
            'data acept');



          
    }

    public function VoPosC(Request $request)
    {       
        
    
    
            DB::table('comentario')->where('idcomentario', $request->get('idcmt'))->increment('valPos');
        
              return $this->archivos($request); 
          
    }


     public function VoNegC(Request $request)
    {       
        
    
    
            DB::table('comentario')->where('idcomentario', $request->get('idcmt'))->increment('valNeg');
        
              return $this->archivos($request); 
          
    }

    public function publicarArt(Request $request)
    {




                    $contenido = DB::table('contenidos')
                                ->where('idcontenido', $request->get('custId'))
                                ->update(['estado' => '1',
                                     
                                     
                                     
                                     ]);
                //    $user->save();

       return redirect()->route('usu')->with('success','Data update');


          
    }

    public function modificarArt(Request $request)
    {
      
        
       
       

            if($request->get('categoria')==1||$request->get('categoria')==2||$request->get('categoria')==3)
                        {
                            
                                $contenido = DB::table('contenidos')
                                ->where('idcontenido', $request->get('custId'))
                                ->update(['estado' => '0',
                                'categoria' => $request->get('categoria'),
                                'nombre' => $request->get('nombre'),
                                'descripcion' => $request->get('desc'),
                                                            
                                                            ]);
                                        //    $user->save();
                        }
                else{
                    
                    $contenido = DB::table('contenidos')
                    ->where('idcontenido', $request->get('custId'))
                    ->update(['estado' => '0',
                    'nombre' => $request->get('nombre'),
                    'descripcion' => $request->get('desc'),
                                                
                                                ]);
                }

       return redirect()->route('usu')->with('success','Data update');


          
    }

    public function borrarArt(Request $request)
    {




                    $contenido = DB::table('contenidos')
                                ->where('idcontenido', $request->get('custId'))
                                ->update(['estado' => '2',
                                     
                                     
                                     
                                     ]);
                //    $user->save();

       return redirect()->route('usu')->with('success','Data update');


          
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

    public function archivos(Request $request)
    {       
        
        
        $contenido = DB::table('contenidos')
        ->join('users',  'contenidos.usuario','=','users.id')
        ->where('idcontenido', $request->get('idprd'))->select('idcontenido as idC', 'nombre','categoria','descripcion','val_pos','val_neg','nick')->get();

        $imagenes = DB::table('imagenC')
        ->where('contenido', $request->get('idprd'))->get();

        $videos = DB::table('videoC')
        ->where('contenido', $request->get('idprd'))->get();

        $comentarios=DB::table('comentario')
        ->where('idcontenido', $request->get('idprd'))->get();

        
 
        return view('archivo', ['contenido' => $contenido,'comentario' => $comentarios,'imagenes' => $imagenes,'videos' => $videos]);
     //return view('archivo');
    }
    public function VotacionPositiva(Request $request)
    {       
        
        DB::table('contenidos')->where('idcontenido', $request->get('idprd'))->increment('val_pos');
        
      return $this->archivos($request); 
          
     }
     public function VotacionNegativa(Request $request)
    {       
        
        DB::table('contenidos')->where('idcontenido', $request->get('idprd'))->increment('val_neg');
        
      return $this->archivos($request); 
          
     }
     


     public function comentario(Request $request)
    {       

            if($request->get('texto')!=null){

            DB::table('comentario')->insert(
                ['idusuario' => $request->get('idAut'), 'idcontenido' => $request->get('idprd'),'texto'=>$request->get('texto'),'valneg'=>0,'valpos'=>0]
            );
        //   return $this->archivos($request);
                                            }
       
            return $this->archivos($request); 
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
}
