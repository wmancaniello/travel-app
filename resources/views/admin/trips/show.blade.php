@extends('layouts.admin')

@section('content')
    <div id="overlay" class="overlay hidden"></div>
    <div class="container">

        <div class="d-flex mt-5 pt-3 justify-content-between mb-3">
            {{-- Pulsante Indietro --}}
            <div>
                <a type="button" class="btn ms_brown_btn mb-2" href="{{ route('admin.trips.index') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="d-none d-md-inline">Torna indietro</span>
                </a>
            </div>
            {{-- /Pulsante Indietro --}}

            {{-- Pulsanti Azione --}}
            <div>
                {{-- Modifica --}}
                <a type="button" class="btn ms_brown_btn2 me-2" href="{{ route('admin.trips.edit', $trip->id) }}">
                    <i class="fa-solid fa-pencil"></i>
                    <span class="d-none d-md-inline">Modifica</span>
                </a>

                {{-- Cancella --}}
                <button type="button" class="btn ms_brown_btn2" data-bs-toggle="modal"
                    data-bs-target="#deleteModal{{ $trip->id }}">
                    <i class="fa-solid fa-trash"></i>
                    <span class="d-none d-md-inline">Cancella</span>
                </button>
            </div>
            {{-- /Pulsanti Azione --}}

        </div>


        <h1 class="mb-4">Dettagli Viaggio</h1>
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="img-fluid ms_rounded rounded" src="{{ asset('storage/' . $trip->image) }}"
                        alt="Immagine di {{ $trip->title }}" style="height: 100%; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $trip->title }}</h2>
                        <p class="card-text"><strong>Descrizione:</strong> {{ $trip->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabella Informazioni --}}
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Data di arrivo</th>
                        <td>{{ $trip->start_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data di Partenza</th>
                        <td>{{ $trip->end_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
