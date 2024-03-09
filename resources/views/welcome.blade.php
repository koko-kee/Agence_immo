@extends('base')


@section('content')

<h1>Agence Immobiliere</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur repellendus neque iste sint. Harum quisquam explicabo cumque ad quaerat quae facere nostrum distinctio. Doloribus omnis laborum commodi impedit explicabo iste.
</p>
<h2>Les dernier Biens</h2>

<div style="display:flex;justify-content:space-between;flex-wra" class="content">
    @foreach ($properties as $property)
    <div class="card" style="width: 18rem;">

        @if ($property->image->first())
            <img style="width: 100%; height: 200px; object-fit: cover;" src="/storage/{{$property->image->first()->image}}" class="card-img-top" alt="Property Image">
        @else
        <img style="width: 100%; height: 200px; object-fit: cove" src="{{asset('images/immo.jpg')}}" class="card-img-top">
        @endif
        <div class="card-body">
            <h5 class="card-title"><a href="#">{{$property->title}}</a></h5>
            <p class="card-text">{{$property->surface}} m2 - {{$property->city}} ({{$property->postal}})</p>
            <p class="card-text" style="color: dodgerblue; font-weight: bolder; font-size: 30px;">
                {{number_format($property->price, 0, ',', ' ')}} €
            </p>
        </div>
    </div>
@endforeach

</div>
@endsection
