     
      @extends("navbar")


@section("content")
    <br>

    @foreach($users as $rows)

    @if (Route::has('login'))

@auth

        @if($rows['id']!=Auth::user()->id)
            <div id="articulo">
                <div class="row">
                    <div class="col col-lg-2">
                        <div>
                            <img src="img/rojo.jpg" alt="..." class="img-thumbnail" style="width: 100px; height: 100px;" >
                        </div>
                    </div>
    
                    <div class=" col">
                        {{$rows['name']}}  {{$rows['apellido']}} 

                        <br>
                        contenido
                    </div>
                    <div class="col  col-lg-2">
            
       
                                <form name="log"  action="{{url('Cant')}}" method="post">
                                @csrf
                                            <div> 
                                            <input type="hidden" id="custId" name="custId" value={{$rows['id']}} >
                                            <input type="hidden" id="autid" name="autid" value={{Auth::user()->id}} >
                                            </div>

                                            <div class="btn-group-vertical">
                        
                                                <button type="submit" class="btn btn-secondary" >detalles</button>
                        
                                            </div>

                                </form> 
                    </div>
                </div>
    
    
    
    
            
    
           
            
          
    
    
    
            </div>

        @endif

        @else  
        <div id="articulo">
                <div class="row">
                    <div class="col col-lg-2">
                        <div>
                    @if($rows['imgUs']<>null)
                        <img src="images/{{$rows['imgUs']}}" alt="..." class="img-thumbnail" height="500" width="500">
                    @else
                        <img src="img/rojo.jpg" alt="..." class="img-thumbnail"  height="500" width="500">
                    @endif                        
                        
                        </div>
                    </div>
    
                    <div class=" col">
                        {{$rows['name']}}  {{$rows['apellido']}} 

                        <br>
                        contenido
                    </div>
                    <div class="col  col-lg-2">
            
       
                                <form name="log"  action="{{url('Can2')}}" method="post">
                                @csrf
                                            <div> 
                                            <input type="hidden" id="custId" name="custId" value={{$rows['id']}} >
                                           
                                            </div>

                                            <div class="btn-group-vertical">
                        
                                                <button type="submit" class="btn btn-secondary" >detalles</button>
                        
                                            </div>

                                </form> 
                    </div>
                </div>
    
        </div>

                @endauth

@endif

    @endforeach



@endsection