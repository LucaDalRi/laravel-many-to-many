@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                {{ $project->title }}
            </h1>

            <h4>
                Slug: {{ $project->slug }}
            </h4>

            <h4>
                Descrizione: {{ $project->description }}
            </h4>

            <h4>
                Categoria: {{ $category->name }}
            </h4>
            
            @if ($project->image)
            <div>
                <img src="{{ asset('storage/'.$project->image) }}" alt="">
            </div>
            @endif

            <a href="route('admin.projects.create')" class="btn btn-success">
                Aggiungi progetto
            </a>
        </div>
    </div>
</div>
@endsection