     
      @extends("navbar")


@section("content")
<br>



          
                @foreach($users as $row)

                @if($row->id ==Auth::user()->id )
  

            @if(count($errors) > 0)

            <div class="alert alert-danger">
                  <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                  </ul>
            @endif




          


      <div style="padding-left: 100px; padding-right: 100px;">
     
         <form method="post" action="{{url('Uudp/$row->id')}}">
          @csrf
          <!-- <input type="hidden" name="_method" value="PATCH" />-->
            <input type="hidden" name="id" value={{Auth::user()->id}} />
           
                

            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$row->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('apellido') }}</label>
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{$row->apellido}}" required >
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>


                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('nickname') }}</label>
                                <div class="col-md-6">
                                    <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick"value="{{$row->nick}}" required >
                                    @error('nick')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$row->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$row->telefono}}" >
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>



                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('direccion') }}</label>
                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$row->direccion}}" >
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>




                <div> 
                  <input type="hidden" id="custId" name="IdPr" value={{Auth::user()->id}} >
                </div>
                <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
           

        </form>

    </diV>

<div style="padding-left: 100px; padding-right: 100px;">
     
      <img src={{Auth::user()->imgUs}} class="d-block w-100" alt="...">
      {{Auth::user()->imgUs}}
      <br>
            <form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <label for="archivo"><b>Archivo: </b></label><br>
                  <input type="file" name="file" required>
                  <input class="btn btn-success" type="submit" value="Enviar" >
             </form>
      
       <br>
      
</div>



<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->




 
<div>

  <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
@foreach($chat as $RC)
     @if($RC->u1id==Auth::user()->id||$RC->u2id==Auth::user()->id)
                      @if($RC->u1id==Auth::user()->id)
                                <a class="nav-link" id="v-{{$RC->idchat}}-tab" data-toggle="pill" href="#v-{{$RC->idchat}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$RC->u2nick}}</a>
                      @else
                                <a class="nav-link" id="v-{{$RC->idchat}}-tab" data-toggle="pill" href="#v-{{$RC->idchat}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$RC->u1nick}}</a>
                      @endif
     @endif
@endforeach
                          </div>
                        </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
     @foreach($chat as $RC)
            


                 
                    <div class="tab-pane fade show" id="v-{{$RC->idchat}}" role="tabpanel" aria-labelledby="v-{{$RC->idchat}}-tab">
                    @foreach($mensaje as $MS)
                      @if($MS->idchat==$RC->idchat)
                              @if($MS->id_env!=Auth::user()->id)
                                <div class="card border-primary mb-3" >
                                    @if($MS->id_env!=$MS->u1id)
                                  <div class="card-header">{{$MS->u1nombre}} {{$MS->u1apellido}}</div>
                                    @else
                                    <div class="card-header">{{$MS->u2nombre}} {{$MS->u2apellido}}</div>
                                    @endif
                                  <div class="card-body text-primary">
                                    <p class="card-text">{{$MS->texto}}</p>
                                    
                                  </div>      
                                </div>


                            @else
                                <div class="card border-success mb-3" >
                                @if($MS->id_env!=$MS->u1id)
                                  <div class="card-header">{{$MS->u1nombre}} {{$MS->u1apellido}}</div>
                                    @else
                                    <div class="card-header">{{$MS->u2nombre}} {{$MS->u2apellido}}</div>
                                    @endif
                                  <div class="card-body text-primary">
                                    <p class="card-text">{{$MS->texto}}</p>
                                    
                                  </div>      
                                </div>
                              
                              @endif    
                          @endif              
                      @endforeach
                      <form action="{{url('MJN')}}" method="post">
                             @csrf
                      <div>
                      <input type="hidden" id="custId" name="idAut" value={{Auth::user()->id}} >
                        <input class="form-control mr-sm-2" type="search" placeholder="mensaje"  name="texto"aria-label="Search">
                        <input type="hidden" id="custId" name="chat" value={{$RC->idchat}} >
                        
                
                        <button type="submit" class="btn btn-primary" onclick="">enviar</button>

                      </div>
                      </form>
                    </div>
                   
         
  
            @endforeach
            <br> 
           

     

         
       
       
       
        </div>
      </div>
    </div>

</div>








    


<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<br>

 <div class="form-group col-md-4" id="cate" onchange="change()">
   
            <select id="inputState" class="form-control">
              <option selected>elige categoria:</option>
              <option value="1">modelo</option>
              <option value="2">animacion</option>
              <option value="3">video</option>
              <option value="4">otras</option>
            </select>

 </div>

         <script> function change() {
               var selectBox = document.getElementById("inputState");
               var selected = selectBox.options[selectBox.selectedIndex].value;
               

               if(selected == '1'){

                 $('.a1').show();
                   $('.a4').hide();
                   $('.a2').hide();
                   $('.a3').hide();
                 
               }
               else if(selected === '2'){
                 $(".a2").show();
                 $(".a1").hide();
                 $(".a3").hide();
                 $(".a4").hide();
               }
               else if(selected === '3'){
                 $('.a3').show();
                   $('.a4').hide();
                   $('.a2').hide();
                   $('.a1').hide();
               }
               else if(selected === '4'){
               
                 $('.a4').show();
                   $('.a1').hide();
                   $('.a2').hide();
                   $('.a3').hide();
               }
               else {
                 
               $('.a4').hide();
                   $('.a1').hide();
                   $('.a2').hide();
                   $('.a3').hide();
               }
         }</script>








  <div>
            <button type="button" class="btn btn-success" id="agrega"  onclick="location.href='{{ url('/producto') }}'" >agregar archivo </button>
</div>


@foreach($contenidos as $row2)
@if($row2->usuario ==Auth::user()->id)
<br>
<div class="a{{$row2->categoria}}">
    <div class="row" id="a{{$row2->categoria}}">
          <div class="col-md-auto">
            <div>
                <img src="img/rojo.jpg" alt="..." class="img-thumbnail">
            </div>
         </div>

        <div class="col">
      <br>            
      <p>  {{$row2->descripcion}}</p>
        </div>
      <br>
        <div style="border-top-width: 15px; padding-top:20px; ">
            <div class="col col-lg-2" align="center">
              <p>{{$row2->nombreC}}  </p>
            </div>
            <div class="col col-lg-2" align="center">
              <p>{{$row2->nombre}}</p>           
            </div>
            <div class="col col-lg-2" align="center">
              
            @if($row2->estado==0)
            <p>estado: privado</p>           
            @endif

            @if($row2->estado==1)
            <p>estado: publicado</p>           
            @endif

            @if($row2->estado==2)
            <p>estado: eliminado</p>           
            @endif   
            

            </div>
        
        </div>           

          <div class="btn-group-vertical">

          <form method="post" action="{{url('EdiA')}}">
                          @csrf
                          <input type="hidden" id="custId" name="custId" value={{$row2->idcontenido}} >
                        
                          <button type="submit"  class="btn btn-success" >modificar</button>

                         
                      </form>




                     @if($row2->estado!=1)
                     <form method="post" action="{{url('PubA')}}">
                          @csrf
                          <input type="hidden" id="custId" name="custId" value={{$row2->idcontenido}} >
                        
                          <button type="submit" class="btn btn-primary">publicar</button>

                         
                      </form>
                     @endif
                     
                     @if($row2->estado!=2)

                     <form method="post" action="{{url('BorA')}}">
                          @csrf
                          <input type="hidden" id="custId" name="custId" value={{$row2->idcontenido}} >
                         
                          <button type="submit" class="btn btn-danger">eliminar</button>

                         
                      </form>
                      
                    @endif
                  </div>

                  
          </div>
  </div>
<br>
@endif

@endforeach

<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>


@endif
   @endforeach
<br>

</div>

@endsection
