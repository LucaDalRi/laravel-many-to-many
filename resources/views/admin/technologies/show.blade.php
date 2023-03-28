@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            
            <h1>
                {{ $technology->name }}
            </h1>

            <h4>
                Tecnologia: {{ $technology->name }}
            </h4>

            <h4>
                Slug: {{ $technology->slug }}
            </h4>

            <a href="route('admin.projects.create')" class="btn btn-success">
                Aggiungi progetto
            </a>
        </div>
    </div>
</div>
@endsection