@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- Pulsante Indietro -->
        <a class="btn btn-primary mt-2" href="{{ route('admin.trips.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Torna Indietro
        </a>

        <div class="row text-center">
            <div class="col-12 my-4">
                <h4>Modifica Viaggio</h4>
            </div>

            <!-- Form per la modifica del viaggio -->
            <form action="{{ route('admin.trips.update', $trip->id) }}" method="post" class="mb-3"
                enctype="multipart/form-data" id="form-trips">
                @csrf
                @method('PUT')

                <div class="container">
                    <div class="row">
                        {{-- Titolo --}}
                        <div class="col-12">
                            <small class="text-muted">* Campi obbligatori</small>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Inserisci Titolo"
                                    value="{{ old('title', $trip->title) }}">
                                <label class="w-100" for="title">Inserisci Titolo *
                                    @error('title')
                                        - {{ $errors->get('title')[0] }}
                                    @enderror
                                </label>
                            </div>
                        </div>
                        {{-- /Titolo --}}

                        {{-- Descrizione --}}
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci descrizione"
                                    name="description" style="height: 100px" id="description">{{ old('description', $trip->description) }}</textarea>
                                <label class="w-100" for="description">Descrizione *
                                    @error('description')
                                        - {{ $errors->get('description')[0] }}
                                    @enderror
                                </label>
                            </div>
                        </div>
                        {{-- /Descrizione --}}

                        {{-- Inizio Viaggio --}}
                        <div class="col-6 mb-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date"
                                    value="{{ old('start_date', $trip->start_date ? \Carbon\Carbon::parse($trip->start_date)->format('Y-m-d') : '') }}">
                                <label class="w-100" for="start_date">Data Inizio Viaggio *
                                    @error('start_date')
                                        - {{ $errors->get('start_date')[0] }}
                                    @enderror
                                </label>
                            </div>
                        </div>
                        {{-- /Inizio Viaggio --}}

                        {{-- Fine Viaggio --}}
                        <div class="col-6 mb-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date"
                                    value="{{ old('start_date', $trip->start_date ? \Carbon\Carbon::parse($trip->start_date)->format('Y-m-d') : '') }}">
                                <label class="w-100" for="end_date">Data Fine Viaggio
                                    @error('end_date')
                                        - {{ $errors->get('end_date')[0] }}
                                    @enderror
                                </label>
                            </div>
                        </div>
                        {{-- /Fine Viaggio --}}

                        {{-- Copertina --}}
                        <div class="col-12 mb-3">
                            <div class="ms_border" id="box-main-img">
                                <label class="w-100" for="image" class="mb-1">Modifica foto principale:</label>
                                <input type="file"
                                    class="form-control mb-3 ms_file image @error('image') is-invalid @enderror"
                                    id="image" name="image" accept=".jpg,.webp,.png,.svg,.bmp,.heic">
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $errors->get('image')[0] }}
                                    </div>
                                @enderror

                                <!-- Anteprima Immagine Corrente -->
                                <div class="preview-image position-relative d-inline-block">
                                    @if ($trip->image)
                                        <img id="preview" src="{{ asset('storage/' . $trip->image) }}"
                                            alt="Immagine di {{ $trip->title }}" style="width: 100%; height: auto;" />
                                    @else
                                        <img id="preview" src="https://picsum.photos/200/300" alt="Anteprima Immagine"
                                            style="width: 100%; height: auto;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- BTN Salva --}}
                    <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                    {{-- /BTN Salva --}}
                </div>
            </form>
        </div>
    </div>

    {{-- Script per anteprima immagine --}}
    <script>
        document.getElementById('image').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
