     
      @extends("navbar")


@section("content")
<br>
<div id="articulo">
                <div class="row">
                    <div class="col col-lg-2">
                        <div>
                            <img src="img/rojo.jpg" alt="..." class="img-thumbnail" style="width: 100px; height: 100px;" >
                        </div>
                    </div>
    
                    <div class=" col">
                        nombre
                        <br>
                        contenido
                    </div>
                    <div class="col  col-lg-2">
                 
                        <div class="btn-group-vertical">
    
                            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/visita') }}'">detalles</button>
    
    
                        </div>
                    </div>
                </div>
    
    
    
    
            
    
           
            
          
    
    
    
            </div>
        

@endsection