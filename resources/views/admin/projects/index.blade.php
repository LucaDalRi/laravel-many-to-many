@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            
            <h1>
                Progetti
            </h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success my-2">
                Aggiungi progetto
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            @foreach ($projects as $project)  
            <tbody>
              <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>
                  <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">Dettagli</a>
                  <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Aggiorna</a>
                  <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$project->id}}">
                      Elimina
                    </button>
                    <div class="modal fade" id="exampleModal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ARE YOU SURE ABOUT THAT?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Sei sicuro di voler eliminare il progetto?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            <button type="submit" class="btn btn-danger">Elimina</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection