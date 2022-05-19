@extends('layouts.public')

@section('title', 'Catalogo')

@section('content') 
  <section class="py-5 container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark text-center">Catalogo</h1>
        <p class="lead text-muted text-center"> <a id="registrazione" href="#"> Registrati</a> per utilizzare i filtri di ricerca ed opzionare gli alloggi </p>
      </div>
    </div>

<div class="container row align-items-center">
    <div class="input-group rounded col">
        <input type="search" class="form-control rounded" placeholder="Luogo" aria-label="Search" />
    </div>
    <div class="col w-25">
    <label> inzio</label>
    </div>
     <div class="form-group col">
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div>
    
<div class="col">
    <label> fine</label>
</div>
<div class="form-group col">
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
       </div>
      </div>
     </div>
</div>
</section> 
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach( $accomodations as $accomodation)    
                @include('components.card', [ 'accomodation' => $accomodation ] )
            @endforeach 
        </div>
    </div>
</div>

<div class="py-5 text-center container">  
   <a href="{{ route('login') }}"> Altri Risultati </a>
</div>

@endsection
<!--    
<!-- Extra JavaScript/CSS added manually in "Settings" tab
<!-- Include jQuery 
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
-->
