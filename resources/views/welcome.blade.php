@extends('layout.base')

@section('content')
    <div class="content">
        <p style="text-align: center">Practical exercise</p>

        <form action="/search" style="text-align: center;">

            <div class="row">
             <div class="col-md-4">
                 <input type="text" name="latitude" id="latitude" placeholder="latitude.." class="form-control @error('latitude') is-invalid @enderror">
                 @error('latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col-md-4">
                 <input type="text" name="longitude" id="longitude" placeholder="longitude.." class="form-control @error('longitude') is-invalid @enderror">
                 @error('longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col-md-2">
                 <select name="ordBy" id="form-select" class="form-select @error('ordBy') is-invalid @enderror">
                     <option value="distance">Mais Proximo</option>
                     <option value="value_day">Preço/Noite</option>
                 </select>
                 @error('ordBy')
                    <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col-md-2">
                 <button class="btn btn-dark btn-block">Search</button>
             </div>
            </div>
            <label for="filter"></label>
        </form>
        <div class="content" id="table-content">
            @if(isset($hotel))
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">KM</th>
                    <th scope="col">Preço/Noite</th>

                </tr>
                </thead>

                    <tbody>
                    @foreach($hotel as $value)
                        <tr>
                            <th>{{$value->id}}</th>
                            <td>{{$value->hotels_name}}</td>
                            <td>{{ number_format($value->distance, 2, '.', '')}}</td>
                            <td>{{$value->value_day}}</td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection
