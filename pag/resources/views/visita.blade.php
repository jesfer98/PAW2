     
      @extends("navbar")


@section("content")

 



    <div style="padding-left: 100px; padding-right: 100px;">
     
     <img src="img/darkside2.jpg" class="d-block w-100" alt="...">
     <br>                         


     <div style="padding-left: 10px;">
         <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
             <div class="card border-primary mb-3" >
             <div class="card-header">mio</div>
             <div class="card-body text-primary">
                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                 <p class="card-text"><small class="text-muted">21/02/2020-10:50</small></p>
             </div>      
             </div>
             
             <div class="card border-success mb-3" >
             <div class="card-header">otra persona</div>
             <div class="card-body text-success">
                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                 <p class="card-text"><small class="text-muted">21/02/2020-10:50</small></p>
             </div>
             </div>
         
             <div>
             <input class="form-control mr-sm-2" type="search" placeholder="mensaje" aria-label="Search">
             
             
     
             <button type="button" class="btn btn-primary" onclick="">enviar</button>
 
             </div>
         
         </div>

     </div>

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

                        <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/archivo') }}'">detalles</button>


                    </div>
                </div>
            </div>
            <br>
            @endforeach
        
     
@endsection

