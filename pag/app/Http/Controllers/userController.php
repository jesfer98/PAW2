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

        $contenidos= DB::table('contenidos')->get();

        $contenidos = DB::table('contenidos')
            ->join('categoria', 'categoria.idcategoria', '=', 'contenidos.categoria')
            ->select('contenidos.*', 'categoria.nombreC')
            ->get();


        return view('/perfil', ['users' => $users,'contenidos'=>$contenidos]);
        


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
