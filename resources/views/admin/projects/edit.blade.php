@extends('layouts/app')

@section('content')

<div class="container py-5">
    <h1>EDIT NEW PROJECT</h1>

    <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')?? $project->name}}" required>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <img src="{{asset('storage/' . $project->preview)}}" alt="image preview">
            <label for="preview">Preview</label>
            <input type="file" class="form-control" name="preview">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required> {{old('description')?? $project->description}} </textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{old('link')?? $project->link}}" required>
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type_id">Types</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
</div>



@endsection