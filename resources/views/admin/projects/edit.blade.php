@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            
            <h1>
                Modifica progetto
            </h1>
            <form action="{{ route('admin.projects.update', ['project' => $project->id ]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="100" minlength="3" placeholder="Inserisci il titolo" value="{{ $project->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <input type="text" class="form-control" id="description" name="description" required max="4096" min="5" placeholder="Inserisci la descrizione" value="{{ $project->description }}">
                </div>
                <button type="submit" class="btn btn-success">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection