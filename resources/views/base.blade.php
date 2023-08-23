<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  @php 
    $route = request()->route()->getName();
  @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" style="color: #fff; font-weight:bolder"  href="{{route('welcome')}}">Agence Immobilier</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link "  href="{{ route('all') }}">Nos biens</a>
              </li>
              @auth
                <li class="nav-item">
                  <a class="nav-link {{ $route == 'property.index' ? 'active' : '' }}"  href="{{ route('property.index') }}">Gérer les biens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ $route == 'option.index' ? 'active' : '' }}" href="{{ route('option.index') }}">Gérer les options</a>
                </li> 
              @endauth
            </ul>
             @auth
             <div class="ms-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link "  href="{{ route('logout') }}">Se deconnecter</a>
                </li>
              </ul>
            </div>
             @endauth

             @guest
             <div class="ms-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link "  href="{{ route('login') }}">Se connecter</a>
                </li>
              </ul>
            </div>
            @endguest
          </div>
        </div>
      </nav>
      <br>
    <div class="container">
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
</body>
</html>