     
      @extends("navbar")


@section("content")


    
  
       
    <br>

  <script>
    $(document).ready(function(){
        $("#m1").hover(function(){
            $("#sho").attr("src", "img/rojo.jpg");
            });
        $("#m2").hover(function(){
            $("#sho").attr("src", "img/azul.jpg");
            });
        $("#m3").hover(function(){
            $("#sho").attr("src", "img/idea stadio.png");
            });
        
    });

</script>
  
<div id="pic" style="padding: 50px;">
      <div class="container-fluid">
    <br>
        <img id="sho" src="img/rojo.jpg" class="rounded" alt="..." height="600px" width="600px">

        tipo

        descripcion
    <br>
    <br>

      </div>


      <div>
          <div class="col-md-6" >
              <img  id="m1"src="img/rojo.jpg" alt=""height="100px" width="100px">
          
              <img id="m2" src="img/azul.jpg" alt="" height="100px" width="100px">
          
              <img id="m3" src="img/idea stadio.png" alt="" height="100px" width="100px">
          </div>

      </div>
     

  </div>

  <div id="pic" style="padding: 50px;">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="que opinas" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="location.href=''">comentar</button>
        </div>

        <div class="input-group mb-3">
                   <div class="input-group-append">
              <button class="btn btn-success" type="button" onclick="location.href=''">gusta 0</button>

              <button class="btn btn-danger" type="button" onclick="location.href=''">no gusta 0</button>
          </div>
    </div>


  </div>
  <div id="pic" style="padding: 50px;">

    <div class="card">
      <div class="card-body">

        <img src="img/azul.jpg" alt="" width="50px" height="50px">
        This is some text within a card body.


        <div>
          <button class="btn btn-success" type="button" onclick="location.href=''">gusta 0</button>

          <button class="btn btn-danger" type="button" onclick="location.href=''">no gusta 0</button>

        </div>
     
     
     
      </div>

      <div class="card">
        <div class="card-body">
  
          <img src="img/azul.jpg" alt="" width="50px" height="50px">
          #referencia   This is some text within a card body.
  
  
          <div>
            <button class="btn btn-success" type="button" onclick="location.href=''">gusta 0</button>
  
            <button class="btn btn-danger" type="button" onclick="location.href=''">no gusta 0</button>
  
          </div>
       
       
       
        </div>
  
  
      </div>


    </div>
  </div>

</div>

@endsection


