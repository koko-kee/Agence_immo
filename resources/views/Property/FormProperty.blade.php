<div class="card">
    @section('title' ,$proprety->exists ? 'Editer un bien' : 'creer un bien')
    <div class="card-body">
        <h1 class="card-title">@yield('title')</h1>
        <form class="row g-3"  action="{{$proprety->exists ? route('property.update',["property" => $proprety->id]) : route('property.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="" class="form-label">Title</label>
                <input type="text" value="{{old('title',$proprety->title)}}" class="form-control" name="title" id="title">
                @error('title')
                  {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">surface</label>
                <input type="number" value="{{old('surface',$proprety->surface)}}" class="form-control" name="surface" id="surface">
                @error('surface')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">prix</label>
                <input type="number" value="{{old('price',$proprety->price)}}" class="form-control" name="price" id="price">
                @error('price')
                {{$message}}
                @enderror
            </div>
            <div class="col-12">
                <label for="" class="form-label">description</label>
                <textarea class="form-control" name="description" id="description" cols="10" rows="3">{{old('description',$proprety->description)}}</textarea>
                @error('description')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">piece</label>
                <input type="number" value="{{old('rooms',$proprety->rooms)}}"  class="form-control" name="rooms" id="rooms">
                @error('rooms')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">chambre</label>
                <input type="number" value="{{old('bedrooms',$proprety->bedrooms)}}" class="form-control" name="bedrooms" id="bedrooms">
                @error('bedrooms')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Etage</label>
                <input type="number" value="{{old('floor',$proprety->floor)}}" class="form-control" name="floor" id="floor">
                @error('floor')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Adresse</label>
                <input type="text" value="{{old('address',$proprety->address)}}" class="form-control" name="address" id="address">
                @error('address')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">ville</label>
                <input type="text" value="{{old('city',$proprety->city)}}" class="form-control" name="city" id="city">
                @error('city')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Postal</label>
                <input type="text" value="{{old('postal',$proprety->postal)}}" class="form-control" name="postal" id="postal">
                @error('postal')
                {{$message}}
                @enderror
            </div>
            <div class="col-md-12">
                <select name="options[]" class="form-select" multiple aria-label="multiple select example">
                    @foreach ($options as $option)
                    <option  @foreach ($proprety->option as $item) @if($item->id == $option->id) selected @endif @endforeach value="{{ $option->id }}">{{ $option->nom }}</option>
                   @endforeach
                
                </select>
            </div>
            <div class="col-md-12">
                <input  class="form-control" type="file" name="images[]" multiple>
            </div>
            <div class="form-check form-switch">
                <input type="hidden" value="0" class="form-check-input" name="sold" type="checkbox" id="flexSwitchCheckDefault">
                <input  @if($proprety->sold == 1) {{'checked'}} @else {{''}} @endif value="1" class="form-check-input" name="sold" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Vendu</label>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>