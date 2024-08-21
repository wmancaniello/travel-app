@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- Pulsante Indietro -->
        <a class="btn btn-primary mt-2" href="{{ route('admin.trips.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Torna Indietro
        </a>

        <div class="row text-center">
            <div class="col-12 my-4">
                <h4>Aggiungi Nuovo Viaggio</h4>
            </div>

            <form action="{{ route('admin.trips.store') }}" method="post" class="mb-3" enctype="multipart/form-data" id="form-trips">
                @csrf

                <div class="container">
                    <div class="row">
                        {{-- Titolo --}}
                        <div class="col-12">
                            <small class="text-muted">* Campi obbligatori</small>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci Titolo" value="{{ old('title') }}">
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
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci descrizione" name="description" style="height: 100px" id="description">{{ old('description') }}</textarea>
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
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
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
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
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
                                <label class="w-100" for="image" class="mb-1">Inserisci foto principale: *</label>
                                <input type="file" class="form-control mb-3 ms_file image @error('image') is-invalid @enderror" id="image" name="image" accept=".jpg,.webp,.png,.svg,.bmp,.heic">
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $errors->get('image')[0] }}
                                    </div>
                                @enderror
                                <div class="preview-image position-relative d-inline-block">
                                    <img id="preview" src="#" alt="Anteprima Immagine" style="display: none; width: 100%; height: auto;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- BTN Aggiungi --}}
                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                    {{-- /BTN Aggiungi --}}
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
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
