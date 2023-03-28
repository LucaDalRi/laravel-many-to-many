@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                {{ $category->name }}
            </h1>

            <h4>
                Slug: {{ $category->slug }}
            </h4>

            <h4>
                Categoria: {{ $category->name }}
            </h4>
            
            <a href="route('admin.projects.create')" class="btn btn-success">
                Aggiungi progetto
            </a>
        </div>
    </div>
</div>
@endsection