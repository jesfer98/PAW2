     
      @extends("navbar")


@section("content")

 



    <div style="padding-left: 100px; padding-right: 100px;">
     
     <img src="img/darkside2.jpg" class="d-block w-100" alt="...">
     <br>      
     @foreach ($user as $r2)                   
     {{$r2->name}} {{$r2->apellido}}
     @endforeach

     @if (Route::has('login'))

@auth  
     
     <div style="padding-left: 10px;">
     
            @if($mensaje->count()>0)
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                @foreach ($mensaje as $row2)
                    @if($row2->id_env==Auth::user()->id)  
                        <div class="card border-primary mb-3" >
                            <div class="card-header">{{Auth::user()->name}} {{Auth::user()->apellido}}</div>
                            <div class="card-body text-primary">
                                <p class="card-text">{{$row2->texto}}</p>
                                <!--<p class="card-text"><small class="text-muted">21/02/2020-10:50</small></p>-->
                            </div>      
                        </div>
                        @else
                        <div class="card border-success mb-3" >
                        @foreach ($user as $r2)                   
                        <div class="card-header"> {{$r2->name}} {{$r2->apellido}}</div>             
                        @endforeach
                        
                            <div class="card-body text-success">
                                <p class="card-text">{{$row2->texto}}</p>
                            
                            </div>
                        </div>
                    @endif
                @endforeach
                <form action="{{url('neoM')}}" method="post">
                @csrf
                    <div>

                                
                        @foreach ($user as $r2)                   
                                
                                    <input type="hidden" id="custId" name="idUsu" value={{$r2->id}} >
                        @endforeach
                            <input type="hidden" id="autid" name="idAut" value={{Auth::user()->id}} >

                            @foreach ($chat as $rd)                   
                                
                                <input type="hidden" id="custId" name="chat" value={{$rd->idchat}} >
                    @endforeach

                        <input class="form-control mr-sm-2" name="texto" type="search" placeholder="mensaje" aria-label="Search">
                        
                        
                
                        <button type="submit" class="btn btn-primary" onclick="">enviar</button>
        
            
            
                    </div>
            
                </form>   
            
            @else
            <form action="{{url('neoC')}}" method="post">
                @csrf
                    <div>

                                
                        @foreach ($user as $r2)                   
                                
                                    <input type="hidden" id="custId" name="idUsu" value={{$r2->id}} >
                        @endforeach
                            <input type="hidden" id="autid" name="idAut" value={{Auth::user()->id}} >

                        <input class="form-control mr-sm-2" name="texto" type="search" placeholder="mensaje" aria-label="Search">
                        
                        
                
                        <button type="submit" class="btn btn-primary" onclick="">enviar</button>
        
            
            
                    </div>
            
            </form>   
            
            @endif


         </div>



     </div>

     @endauth

@endif
     <br>
    </div>


 <div id="articulo" style="padding-left: 100px;">
        



        @foreach ($contenido as $rows)             
        
        
            <div class="row">
                <div class="col col-lg-2">
                    <div>
                        <img src="img/rojo.jpg" alt="..." class="img-thumbnail">
                    </div>
                </div>

                <div class=" col">
                {{$rows->nombre}}  {{$rows->descripcion}} 

                </div>
                <div class="col  col-lg-2">
            
                    <div class="btn-group-vertical">
                    <form action="{{url('shArch')}}" method="post">
                             
                    @csrf
                             <input type="hidden" id="custId" name="idprd" value={{$rows->idcontenido}} >

                             <button type="submit" class="btn btn-secondary" onclick="">detalles</button>
                        </form>

                    </div>
                </div>
            </div>
            <br>
            @endforeach
        
     
@endsection

