     
      @extends("navbar")


@section("content")


    
  
       
    <br>

  




@foreach($contenido as $cnt)

  
    
  



          <script>
              $(document).ready(function(){
        
          @foreach($imagenes as $imgs)

                  $("#m{{$imgs->idimagenC}}").hover(function(){
                      $("#sho").attr("src", "images/{{$imgs->url}}");
                      });

          @endforeach

              });

          </script>


    <div id="esp1" style="padding: 50px;">
          <div class="container-fluid">
                <br>

                <div class="clearfix">
                <?php $ant2 = 0; ?>
                
                @foreach($imagenes as $imgs)         
                    @if($imgs->contenido<>$ant2)

                        <img id="sho" src="images/{{$imgs->url}}" alt="..." height="600px" width="600px" class="float-left">
                    
                    @endif
                    <?php $ant2 = $imgs->contenido ?>
                
                @endforeach
                
                
                    <p>            nombre:     {{$cnt->nombre}}</p> 
                    
                    <br>
                    <p>            categotia:  {{$cnt->categoria}}</p>
                    <br>
                    <p>     descripcion: {{$cnt->descripcion}}</p>

                </div>
                      <br>
          </div>


          <div>
              <div class="col-md-6" >

              @foreach($imagenes as $imgs)

                  <img  id="m{{$imgs->idimagenC}}"src="images/{{$imgs->url}}" alt=""height="100px" width="100px">
              
            
              
              @endforeach

              </div>

          </div>
        

    </div>
    

    
      @if (Route::has('login'))

    @auth        
          <div id="esp2" style="padding: 50px;">
              <br>
        
                <div>
                  <form action="{{url('megusta')}}" method="post">              
                            @csrf
                            <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >
                            <button class="btn btn-success" type="submit" onclick="location.href=''">gusta {{$cnt->val_pos}}</button>
                  </form>
                          <form action="{{url('shArch')}}" method="post">
                                  
                                  @csrf
                                            <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >
              
                                            <button type="submit" class="btn btn-secondary" onclick="">detalles</button>
                          </form>
                          <form action="{{url('nogusta')}}" method="post">              
                            @csrf
                            <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >
                            <button class="btn btn-danger" type="submit" onclick="location.href=''">no gusta {{$cnt->val_neg}}</button>
                          </form>


                </div>

              <br>

          </div>

        

          <div id="esp3" style="padding: 50px;">
            <br>
              <div>


                    <form action="{{url('comentario')}}" method="post">
                      @csrf
                        <input type="hidden" id="custId" name="idAut" value={{Auth::user()->id}} >
                        <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >


                        <input type="text" class="form-control" name="texto" placeholder="que opinas" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">comentar</button>
                        </div>
                    </from>
              </div>
          </div>
    @else

              <br>
              <div id="esp4" style="padding: 50px;">
                    <br>
                    <div class="input-group mb-3">
                                <div class="input-group-append">

                                      <button class="btn btn-success" type="button">gusta {{$cnt->val_pos}}</button>
                                      <button class="btn btn-danger" type="button" >no gusta {{$cnt->val_neg}}</button>
                                

                                </div>
                          <br>

                    </div>
              </div>
              @endauth
              @endif

@endforeach

    <div id="esp5" style="padding: 50px;">

      <div class="card">
    
            @foreach($comentario as $coment)
              <div class="card-body">
                    <div class="clearfix">
                      <img src="img/azul.jpg" alt="" width="50px" height="50px" class="float-left">
                      <p></p>
                      <p> {{$coment->texto}} </p>

              </div>
              
                  </div>
                @if (Route::has('login'))

                  @auth     
                  <div>   
                      <form >  
                        

                           
                      </form>
                  </div>
              
                  <div>   
                      <form action="{{url('nogV')}}" method="post">  
                        

                              @csrf
                              <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >
                              <input type="hidden" id="custId" name="idAut" value={{Auth::user()->id}} >
                              <input type="hidden" id="custId" name="idcmt" value={{$coment->idcomentario}} >
                              <button class="btn btn-success" type="submit">gusta {{$coment->valPos}}  </button>
                      </form>
                  </div>
                    
                    <div>
                        <form action="{{url('nogC')}}" method="post">   
                              
                          @csrf
                          <input type="hidden" id="custId" name="idprd" value={{$cnt->idC}} >
                          <input type="hidden" id="custId" name="idAut" value={{Auth::user()->id}} >
                          <input type="hidden" id="custId" name="idcmt" value={{$coment->idcomentario}} >
                          <button class="btn btn-danger" type="submit" >no gusta {{$coment->valNeg}} </button>
                        </form>
                    </div>
              
                  @else

                  <div>
                      <button class="btn btn-success" type="button">gusta {{$coment->valPos}}</button>
                      <button class="btn btn-danger" type="button" >no gusta {{$coment->valNeg}}</button>

                  </div>
                  @endauth
                @endif
      
            @endforeach

      </div>
    </div>



@endsection


