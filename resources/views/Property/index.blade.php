@extends('base')

@section('title','Tous les biens')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <h1 class="card-title">@yield('title')</h1>
        <a style="float: right;" href="{{route('property.create')}}" class="btn btn-primary">Ajouter un biens</a>
        <br>
        <br>
        <table class="table table-bordered"">
            <thead>
              <tr>
                <th scope="col">Titre</th>
                <th scope="col">Surface</th>
                <th scope="col">Prix</th>
                <th scope="col">Ville</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($properties as $property)
              <tr>
                <th>{{$property->title}}</th>
                <td>{{$property->surface}} m2</td>
                <td>{{number_format($property->price,thousands_separator: ' ')}}</td>
                <td>{{$property->city}}</td>
                <td>
                    <a href="{{route('property.edit',["property" => $property->id])}}" class="btn btn-primary">Editer</a>
{{--                    @can('delete',$property)--}}
                    <a href="{{route('property.delete',["property" => $property->id])}}" class="btn btn-danger">supprimer</a>
{{--                    @endcan--}}
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        {{$properties->links()}}
    </div>
</div>

@endsection
