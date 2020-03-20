     
      @extends("navbar")


@section("content")



<div class="container" style="padding-top:15px; padding-bottom:15px;" >
       
       @if (count($errors)>0)
            <div class="alert alert-danger">
                <Ul>
                @foreach($errors->all() as $error)
                <li>
                {{$error}}
                </li>
                @endforeach
                </Ul>
            </div>
       @endif

            @if(\Session::has('success'))
                        <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                        </div>
            @endif

        <form name="log"  action="{{url('Cont')}}" method="post">
        
        {{csrf_field()}}
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="nombre" name="nombre">
                </div>
                <div class="col" style=" padding-top:7 px;">


                        <div class="form-group col-md-4" id="cate" >
   
                                <select id="inputState" class="form-control" name="categoria">
                                  <option selected>elige categoria:</option>
                                  <option value="1">modelo</option>
                                  <option value="2">video</option>
                                  <option value="3">animacion</option>
                                  <option value="4">otras</option>
                                </select>
                              </div>


                </div>
            </div>

         

            <div class="input-group mb-3" style="padding-top:20px;">
                <input type="text" id="descprod" name="desc" class="form-control" placeholder="descripcion" aria-label="Username" name="descripcion" aria-describedby="basic-addon1">
            </div>


                 <div class="form-group">
                  <label for="exampleFormControlFile1">poner imagen</label>
                  <input type="file" class="form-control-file" id="fileUpload" name=" file">
                </div>



            <div class="input-group mb-3" style="padding-top:10px;">
                <input type="text" id="URLV" name="urlV" class="form-control" placeholder="url video" aria-label="url video" aria-describedby="basic-addon1">
            </div>


<div> 
<input type="hidden" id="custId" name="custId" value={{Auth::user()->id}} >
  </div>

  <div> 
<input type="hidden" id="custId" name="val_pos" value="0" >
  </div>

  <div> 
<input type="hidden" id="custId" name="val_neg" value="0" >
  </div>

  <div> 
<input type="hidden" id="custId" name="estado" value="0" >
  </div>

            <div>
            <button type="submit" class="btn btn-success" >aceptar</button>

            <button type="button" class="btn btn-danger" onclick="location.href='registro.html'">cancelar</button>
        </div>
       

        </form>

        




@endsection
