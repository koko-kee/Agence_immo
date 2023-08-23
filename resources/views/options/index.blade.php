@extends('base')

@section('title','Tous les options')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <h1 class="card-title">@yield('title')</h1>
        <a style="float: right;" href="{{route('option.create')}}" class="btn btn-primary">Ajouter une option</a>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($options as $option)
              <tr>
                <th>{{$option->nom}}</th>
                <td>
                    <a href="{{route('option.edit',["option" => $option->id])}}" class="btn btn-primary">Editer</a>
                    <a href="{{route('option.delete',["option" => $option->id])}}" class="btn btn-danger">supprimer</a>
                </td>
              </tr> 
              @endforeach
            </tbody>
        </table>  
        {{$options->links()}}      
    </div>
</div>

@endsection