@extends("navbar")


@section("content")

    @foreach($contenido as $rows)

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

         <form name="log"  method="post" action="{{url('modA')}}" enctype="multipart/form-data">
                
                {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="nombre" name="nombre" value="{{$rows->nombre}}">
                        </div>
                        <div class="col" style=" padding-top:7 px;">


                                <div class="form-group col-md-4" id="cate" value="{{$rows->categoria}}" >
        
                                        <select id="inputState" class="form-control" name="categoria" value="{{$rows->categoria}}">
                                        <option selected>elige categoria:</option>
                                        <option value="1">modelo</option>
                                        <option value="2">animacion</option>
                                        <option value="3">video</option>
                                        <option value="4">otras</option>
                                        </select>
                                    </div>


                        </div>
                    </div>

                

                    <div class="input-group mb-3" style="padding-top:20px;">
                        <input type="text" id="descprod" name="desc" class="form-control" placeholder="descripcion" aria-label="Username" name="descripcion"  value="{{$rows->descripcion}}" aria-describedby="basic-addon1">
                    </div>


                        <div class="form-group">
                        <?php $a = 1; ?>
                        @foreach($imagen as $rI)
                        {{$rI->url}}
                      
                     
                        <input type="hidden" id="custId" name="file{{$a}}Id" value={{$rI->id}} >
                        <label for="exampleFormControlFile1">poner imagen {{$a}}</label>
                        <input type="file" class="form-control-file" id="fileUpload" name="file{{$a}}" value="{{$rI->url}}">
                        <?php $a++; ?>
                        
                        @endforeach

@for($i=$a; $i <= 3; $i++)
                        <input type="hidden" id="custId" name="file{{$i+3}}Id" value={{$i}} > 
                        <label for="exampleFormControlFile1">poner imagen {{$i}}</label> 
                        <input type="file" class="form-control-file" id="fileUpload" name="file{{$i+3}}" >
@endfor


                        </div>



                        <div class="form-group">
                        <?php $b = 1; ?>
                        @foreach($video as $rL)
                        {{$rL->url}}
                      
                     
                        <input type="hidden" id="custId" name="vidid" value={{$rL->id}} >
                        <label for="exampleFormControlFile1">video {{$b}}</label>
                        <input type="file" class="form-control-file" id="fileUpload" name="vid" value="{{$rL->url}}">
                        <?php $b++; ?>
                        
                        @endforeach

@for($i=$b; $i <= 1; $i++)
                        <input type="hidden" id="custId" name="vidid2" value={{$i}} > 
                        <label for="exampleFormControlFile1">video {{$i}}</label> 
                        <input type="file" class="form-control-file" id="fileUpload" name="vid2" >
@endfor


                        </div>




                   
                    <input type="hidden" id="custId" name="custId" value={{$rows->id}} >
 

        <div> 
        
        </div>

                    <div>
                    <button type="submit" class="btn btn-success" >aceptar</button>

                    <button type="button" class="btn btn-danger" onclick="location.href='{{ url('/perfil') }}'">cancelar</button>
                </div>
            

    </form>

                


    @endforeach

@endsection
