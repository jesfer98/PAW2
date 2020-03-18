     
      @extends("navbar")


@section("content")
<br>


<div style="padding-left: 100px; padding-right: 100px;">
     
      <img src="img/darkside2.jpg" class="d-block w-100" alt="...">
      <br>
      <input class="form-control mr-sm-2" type="search" placeholder="direccion imagen" aria-label="Search">
      <button type="button" class="btn btn-secondary"> modificar</button>
      
        <br>
      
</div>



<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->


<div style="padding-left: 20px; padding-right: 20px;">
  <div class="row" style="padding-top: 20px;padding-bottom: 20px;">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">comentario persona1</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">comentario persona4</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">comentario persona3</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">comentario persona2</a>
      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
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
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">perro</div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">gato</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">mas</div>
      </div>
    </div>
  </div>

  <div class="form-group col-md-4" id="cate">
   
    <select id="inputState" class="form-control">
      <option selected>elige categoria:</option>
      <option value="1">modelo</option>
      <option value="2">video</option>
      <option value="3">animacion</option>
      <option value="4">otras</option>
    </select>

  </div>


<div>
            <button type="button" class="btn btn-success" id="agrega"  onclick="location.href='{{ url('/producto') }}'" >agregar archivo </button>
</div>



<br>

    <div class="row">
        <div class="col-md-auto">
            <div>
                <img src="img/rojo.jpg" alt="..." class="img-thumbnail">
            </div>
        </div>

        <div class="col">
<br>            
<p>  descripcion</p>
        </div>
<br>
<div style="border-top-width: 15px; padding-top:20px; ">
        <div class="col col-lg-2" align="center">
           <p>categoria  </p>
        </div>
        <div class="col col-lg-2" align="center">
           <p>nombre</p>           
        </div>
        
        </div>           

 <div class="btn-group-vertical">
                <button type="button" class="btn btn-success" onclick="location.href='{{ url('/producto') }}'">modificar</button>

                <button type="button" class="btn btn-primary">publicar</button>
                
                <button type="button" class="btn btn-danger">eliminar</button>

            </div>

            <br>
    </div>




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


<br>

</div>

@endsection
