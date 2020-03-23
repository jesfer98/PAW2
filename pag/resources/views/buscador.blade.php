     
      @extends("navbar")


@section("content")

@foreach($contenido as $rows)



<br>
        <div id="articulo">
            <div class="row">
                <div class="col col-lg-2">
                    <div>
                        <img src="img/rojo.jpg" alt="..." class="img-thumbnail">
                    </div>
                </div>

                <div class=" col">
                {{$rows->nombre}}
                <br>
              {{$rows->categoria}}
                <br>
                {{$rows->descripcion}}
                <br>
                <button type="button" class="btn btn-success" >gusta {{$rows->val_pos}}</button>
                <button type="button" class="btn btn-danger" >no gusta {{$rows->val_neg}}</button>

                </div>
                <div class="col  col-lg-2">
             
                    <div class="btn-group-vertical">

                    <form action="{{url('shArch')}}" method="post">
                             
                             @csrf
                                      <input type="hidden" id="custId" name="idprd" value={{$rows->id}} >
         
                                      <button type="submit" class="btn btn-secondary" onclick="">detalles</button>
                                 </form>

                    </div>
                </div>
            </div>

        </div>

@endforeach
@endsection


