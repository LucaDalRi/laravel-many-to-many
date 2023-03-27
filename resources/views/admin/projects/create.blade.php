@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            
            <h1>
                Crea nuovo progetto
            </h1>
            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="100" minlength="3" placeholder="Inserisci il titolo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <input type="text" class="form-control" id="description" name="description" required max="4096" min="5" placeholder="Inserisci la descrizione">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                </div>
                <p class="text-warning">
                    Lo slug verrà create automaticamente
                </p>
                <button type="submit" class="btn btn-success">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection