@extends('layout')

@section('title')
    Create
@endsection

@section('content')

    <div class="mb-4">
        <h1>Create new</h1>
    </div>

    <div class="mb-3">
        <form method="POST" action="/projects" enctype="multipart/form-data">

            @csrf
            <div>
                <span>Name:</span>
                <div>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div>
                <span>Date of birth:</span>
                <div>
                    <input type="date" name="dob" min="1900-01-01" max="2010-12-31" value="{{ old('dob') }}">
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
                    <input type="file" name="avatar" class="d-none" for="avatar" id="profile-img">
                    <img id="profile-img-tag" src="/storage/defaultavatar.png" class="w-25">
                </label>
            </div>
            <div>
                <span>Mail:</span>
                <div>
                    <input type="text" name="mail" value="{{ old('mail') }}">
                </div>
            </div>
            <div>
                <span>Phone:</span>
                <div>
                    <input type="text" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div>
                <span>Description:</span>
                <div>
                    <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger">Add new</button>
            </div>
        </form>
    </div>

    @if ($errors -> any())
        <div>
            <ul class="bg-danger">
                @foreach($errors->all() as $error)
                    <li class="text-white">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

