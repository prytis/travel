@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime klijento informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Vardas:</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Pavardė:</label>
                            <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}">
                        </div>
                        <div class="form-group">
                            <label for="">E Mail:</label>
                            <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono nr:</label>
                            <input type="phone" name="phone" class="form-control" value="{{ $customer->phone }}">
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
