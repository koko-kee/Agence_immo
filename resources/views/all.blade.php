@extends('base')


@section('content')



<form action="" method="get">
    <div class="row">
        <div class="col-md-3">
          <input type="number" name="surface" class="form-control" placeholder="Surface min" >
        </div>
        <div class="col-md-3">
          <input type="number" name="rooms" class="form-control" placeholder="Nombre de piece" aria-label="Last name">
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" name="price" placeholder="Budget Max" aria-label="Last name">
        </div>
        <div class="col-md-2">
            <input type="text" name="title" class="form-control" placeholder="mot cle" aria-label="Last name">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </div>
</form>
<br>
<div style="display:flex;justify-content:space-between;flex-wrap:wrap" class="content">
   
    @foreach ($properties as $property)
        <div class="card mb-5" style="width: 18rem;">
            @if ($property->image->first())
               <img style="width: 100%; height: 200px; object-fit: cover;" src="/storage/{{$property->image->first()->image}}" class="card-img-top">
            @else
            <img style="width: 100%; height: 200px; object-fit: cover;" src="" class="card-img-top">
            @endif
            <div class="card-body">
            <h5 class="card-title"><a href="{{route('show',['name' => $property->title , 'property' =>  $property->id ])}}">{{$property->title}}</a></h5>
            <span>{{$property->surface}} m2 - {{$property->city}} ({{$property->postal}})</span>
            <span style="display: block;color:dodgerblue;font-weight:bolder;font-size:30px">{{number_format($property->price, 0, ',', ' ')}} € </span>
            </div>
        </div>
    @endforeach
</div>
{{$properties->links()}}
@endsection
