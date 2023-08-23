@extends('base')

@section('content')
   <div class="card">
      <div class="card-body">
         <h1 class="card-title">Se connecter</h1>
         @if(session('error'))
         <div class="alert alert-danger">
            {{session('error')}}
         </div>
         @endif
         <form method="POST" action="">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
              {{$message}}
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              @error('password')
              {{$message}}
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </form>
      </div>
   </div>
@endsection