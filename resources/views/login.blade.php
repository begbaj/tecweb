@extends('layouts.public', ['hideLoginForm' => True])

@section('title', 'Login')

@section('content')
<div class="container-fluid bg-body">
    <div class="jumbotron bg-cover rounded ml-5 mr-5" style="background-image: linear-gradient(to bottom, rgba(3,169,244,0.7) 0%, rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature); background-size: cover">    
      <div class="container text-light">  
        <div class="container bg-transparent mt-5 mb-4 pb-3 pt-5 text-center ">
            <div class="text-center mb-1">
                <img src="img/brand/logo-colored.png" style="width: 80px;" alt="logo-coloured">
            </div>
            <h2 class="jumbotron-heading jumbotron-fluid"> Benvenuto su Kumuuzag!</h2>
            <h2 class="lead"> Effettua il login.</h2>
            <form>
                <div class= "d-flex justify-content-center pe-5">
                    <div class="form-outline row mb-2 mt-4 w-50">
                        <label class="col-sm-2 col-form-label" for="username"><strong>Username</strong></label>
                        <div class=" col-sm-7 ps-3">
                            <input type="username" id="username" class="form-control ms-5" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pe-5">
                <div class="form-outline row mb-4 mt-3 w-50 ">
                    <label class="col-sm-2" for="password"><strong>Password</Strong></label>
                    <div class="col-sm-7 ps-3">
                        <input type="password" id="password" class="form-control ms-5" placeholder="Password"/>
                    </div>
                </div>
                </div>    
            </form>
            <div class="text-center">
                <button class="btn btn-primary mb-3 mt-2" type="button">Login</button>
            </div>
            <div class="text-center mt-3">
                <p><small>Non sei ancora registrato? <a href="login.html">Registrati ora!</a></small></p>
            </div>
        </div>
      </div>    
    </div>
</div>
@endsection
