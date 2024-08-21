@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class=" pt-5">I TUOI VIAGGI</h1>

        <a class="btn btn-primary mt-3 mb-3" href="{{ route('admin.trips.create') }}">
            <i class="fa-solid fa-plus"></i> Nuovo Viaggio
        </a>

        <div class="row justify-content-lg-start justify-content-between">
            @foreach ($trips as $trip)
                <div class="col-md-5 mb-4 col-lg-4">
                    <div class="card h-100 ms_card">
                        
                        {{-- Immagine del Viaggio --}}
                        <img src="{{ $trip->image ? asset('storage/' . $trip->image) : 'https://picsum.photos/200/300' }}" class="card-img-top" alt="Immagine di {{ $trip->title }}">
                        {{-- /Immagine del Viaggio --}}

                        <div class="card-body d-flex flex-column ">
                            <h5 class="card-title">{{ $trip->title }}</h5>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-primary" href="#">Dettagli</a>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary" title="Modifica">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Elimina"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $trip->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modale conferma eliminazione --}}
                @include('admin.partials.delete_modal', ['trip' => $trip])
                {{-- /Modale --}}
            @endforeach
        </div>
    </div>


    <style>
        .card-img-top {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endsection
