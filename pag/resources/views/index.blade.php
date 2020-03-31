     
      @extends("navbar")


@section("content")





<div class="container-fluid">

        <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/rojo.jpg" alt="Los Angeles" width="1100" height="500">
            </div>
            <div class="carousel-item">
            <img src="img/rojo.jpg" alt="Chicago" width="1100" height="500">
            </div>
            <div class="carousel-item">
            <img src="img/azul.jpg" alt="New York" width="1100" height="500">
            </div>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        </div>

</div>


      @endsection