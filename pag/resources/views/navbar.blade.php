<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <title>resultado busqueda</title>
</head>
<body>

<style>
            #articulo{  padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 40px;
            }


            .navbar-custom {
                background-color: #ffffff;
            }

            .navbar-custom .navbar-brand,
            .navbar-custom .navbar-text {
                color: #F827F6;
                padding: 0.8rem 1rem;
            }

            .navbar-custom .navbar-nav .nav-link {
                color: red;
                padding: 1rem 1rem;
            }

            .navbar-custom .nav-item.active .nav-link,
            .navbar-custom .nav-item:hover .nav-link {
                color: #ffffff;
                background-color:#179539 ; 
            }.navbar-custom {
                background-color: #00ffc3;
            }


            .navbar-custom .navbar-brand,
            .navbar-custom .navbar-text {
                color: rgba(255,255,255,.8);
            }


            .navbar-custom .navbar-nav .nav-link {
                color: rgb(251, 255, 36);
            }


            .navbar-custom .nav-item.active .nav-link,
            .navbar-custom .nav-item:hover .nav-link {
                color: #ffffff;
            }

            .navbar-custom .dropdown-menu {
                background-color: #2f9613;
            }
            .navbar-custom .dropdown-item {
                color: #ffffff;
            }
            .navbar-custom .dropdown-item:hover,
            .navbar-custom .dropdown-item:focus {
                color: #333333;
                background-color: rgba(255,255,255,.5);
            }
</style>

<nav class="navbar navbar-expand-sm navbar-custom bg-primary">
  <a class="navbar-brand" href="{{ url('/land') }}">briefcase</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/index') }}">Home </a>
              </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          secion
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
        @if (Route::has('login'))

@auth

<a class="dropdown-item" href="{{ url('/perfil') }}">perfil</a>
<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          @else
          <a class="dropdown-item" href="{{ route('login') }}">login</a>
          <a class="dropdown-item" href="{{ route('register') }}">sign up</a>
         
        
    @endauth

@endif

         
          




          


        
      </li>
        <li class="nav-item ">
        <a class="nav-link" href="{{ url('/usuarios') }}">usuarios</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="{{url('buscador')}}">
    @csrf
        @if (Route::has('login'))

                @auth
                <input type="hidden" id="custId" name="custId" value={{ Auth::user()->id}} >
                @else
                <input type="hidden" id="custId" name="custId" value=0 >
                @endauth

        @endif
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button type="submit" class="btn btn-success">buscar</button>
      

     
    </form>
  </div>
</nav>
   

@if (Route::has('login'))

          @auth

          <nav class="navbar navbar-expand-sm navbar-custom bg-primary">
            

              
              <img src="img/jaryuu.png" alt="Smiley face" height="60" width="60">

 
            
              <a class="text">
                                  <a class="text" >    {{ Auth::user()->nick}} </a>
                         
                              

                              </a>


              </nav>
              @endauth

    @endif
@yield("content")




  

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 

</body>
</html>