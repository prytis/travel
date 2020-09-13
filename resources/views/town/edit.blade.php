@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime šalies informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('town.update', $town->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="title" class="form-control" value="{{ $town->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Populiacija</label>
                            <input type="text" name="population" class="form-control" value="{{ $town->population }}">
                        </div>
                        <div class="form-group">
                           <label>Šalis: </label>
                           <select name="country_id" id="" class="form-control">
                                <option value="" selected disabled>Pasirinkite šalį</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                                @endforeach
                           </select>
                       </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
