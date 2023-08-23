<div class="card">
    @section('title' ,$option->exists ? 'Editer une option' : 'creer une option')
    @section('nameSubmit' ,$option->exists ? 'Modifier' : 'Creer')
    <div class="card-body">
        <h1 class="card-title">@yield('title')</h1>
        <br>
        <form class="row g-3" action="{{$option->exists ? route('option.update',["option" => $option->id]) : route('option.store')}}" method="post">
            @csrf
            <div class="col-md-5">
              <label for="inputPassword2" class="visually-hidden">Nom</label>
              <input type="text" value="{{old('nom',$option->nom)}}" name="nom" class="form-control" id="inputPassword2" placeholder="Nom">
              @error('nom')
              {{$message}}
               @enderror
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">@yield('nameSubmit')</button>
            </div>
          </form>

    </div>
</div>