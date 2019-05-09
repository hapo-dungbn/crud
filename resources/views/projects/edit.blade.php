@extends('layout')

@section('title')
    Create
@endsection

@section('content')

    <div class="mb-4">
        <h1>Edit</h1>
    </div>

    <div class="mb-3">
        <form method="POST" action="/projects/{{ $project->id }}">

            @method('PATCH')
            @csrf

            <div>
                <span>Name:</span>
                <div>
                    <input type="text" name="name" value="{{ $project->name }}">
                </div>
            </div>
            <div>
                <span>Date of birth:</span>
                <div>
                    <input type="text" name="dob" value="{{ $project->dob }}">
                </div>
            </div>
            <div>
                <span>Gender:</span>
                <div>
                    <label class="form-check-inline m-0">
                        <input class="mr-1" type="radio" name="gender" value="1" checked> Male
                    </label>
                    <label class="form-check-inline m-0">
                        <input class="mr-1" type="radio" name="gender" value="0"> Female
                    </label>
                </div>
            </div>
            <div>
                <label id="avatar">
                    <input type="file" name="avatar" class="d-none" for="avatar">
                    <img src="{{ asset('storage/'.$project->avatar) }}" class="w-25">
                </label>

            </div>
            <div>
                <span>Mail:</span>
                <div>
                    <input type="text" name="mail" value="{{ $project->mail }}">
                </div>
            </div>
            <div>
                <span>Phone:</span>
                <div>
                    <input type="text" name="phone" value="{{ $project->phone }}">
                </div>
            </div>

            <div>
                <span>Description:</span>
                <div>
                    <textarea class="form-control" name="description">{{ $project->description }}</textarea>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger">Update</button>
            </div>
        </form>
    </div>

    @if ($errors -> any())
        <div class=" d-flex justify-content-center">
            <ul class="bg-danger">
                @foreach($errors->all() as $error)
                    <li class="text-white">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



@endsection