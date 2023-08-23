@extends('base')

@section('content')

<div style="display:flex" class="content">

  <div style="max-width: 800px" id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach($property->image as $index => $image)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <img width="100%" height="600px"  style="object-fit: cover" src="/storage/{{$image->image}}" class="d-block w-100" alt="...">
      </div>
    @endforeach
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
        <p>{{$property->description}}</p>
        <h3>Caracteristiques</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Surfcae Habitale</th>
                <th scope="col">Piece</th>
                <th scope="col">Chambre</th>
                <th scope="col">Etage</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$property->surface}} m2</th>
                <td>{{$property->rooms}}</td>
                <td>{{$property->bedrooms}}</td>
                <td>{{$property->floor}}</td>
              </tr>
            </tbody>
          </table>
          <h2>Specificite</h2>
          <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              @foreach($property->option as $items)
              <li class="list-group-item">{{$items->nom}}</li>
              @endforeach
            </ul>
          </div>
    </div>
<div class="div">
    <h1 style="margin-left:30px">{{$property->title}}</h1>
    <h3 style="margin-left:30px">{{$property->rooms}} Piece - {{$property->surface}} m2</h3>
    <h3 style="margin-left:30px;color:dodgerblue;font-weight:bolder">{{number_format($property->price,thousands_separator: ' ')}} €</h3>
    <hr style="margin-left:30px">
    <h3 style="margin-left:30px">Interesse par ce bien ?</h3>
    @if(session('success'))
      <div style="margin-left:30px" class="alert alert-success">
          {{session('success')}}
      </div>
    @endif
    <div style="margin-left:30px" class="card">
        <div class="card-body">
            <form method="post" action="{{route('contact',['property' => $property->id ])}}" class="row g-3">
                @csrf
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Prenom</label>
                  <input type="text" class="form-control" name="firstnane" placeholder="Prenom" id="inputEmail4">
                  @error('firstnane')
                  {{$message}}
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Nom</label>
                  <input type="text" name="name" placeholder="Nom" class="form-control" id="inputPassword4">
                  @error('name')
                  {{$message}}
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="inputAddress" class="form-label">Telephone</label>
                  <input type="number" name="phone" class="form-control" id="inputAddress" placeholder="Telephone">
                  @error('phone')
                  {{$message}}
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="inputAddress2" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputAddress2" placeholder="Email">
                  @error('email')
                  {{$message}}
                  @enderror
                </div>
                <div class="col-md-12">
                  <label for="inputCity" class="form-label">Message</label>
                  <textarea name="message"  class="form-control" name="message" id="" cols="" rows="3"></textarea>
                  @error('message')
                  {{$message}}
                  @enderror
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Nous contacter</button>
                </div>
              </form>
        </div>
    </div>

</div>

</div>


@endsection