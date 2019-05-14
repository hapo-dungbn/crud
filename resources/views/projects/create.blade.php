@extends('layout')
@section('title')
    Create
@endsection
@section('content')
    <div class="mb-4">
        <h1>Create new</h1>
    </div>
    <div class="mb-3">
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="inputName">Name:</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputName" placeholder="Enter name" type="text" name="name" value="{{ old('name') }}">
                <h6 class="text-danger">{{ $errors->first('name') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputDate">Date of birth:</label>
                <input class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" id="inputDate" type="date" name="dob" min="1900-01-01" max="2010-12-31" value="{{ old('dob') }}">
                <h6 class="text-danger">{{ $errors->first('dob') }}</h6>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="radioMale" type="radio" name="gender" value="1" checked>
                    <label class="form-check-label" for="radioMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="radioFemale" type="radio" name="gender" value="0">
                    <label class="form-check-label" for="radioFemale">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label id="avatar">
                    <input type="file" name="avatar" class="d-none" for="avatar" id="profile-img">
                    <img id="profile-img-tag" src="/storage/default_avatar.png" class="w-25">
                </label>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email:</label>
                <input class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" id="inputEmail" placeholder="Enter email" type="email" name="mail" value="{{ old('mail') }}">
                <h6 class="text-danger">{{ $errors->first('mail') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputPhone">Phone:</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="inputPhone" placeholder="Enter phone number" type="text" name="phone" value="{{ old('phone') }}">
                <h6 class="text-danger">{{ $errors->first('phone') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputDescription">Description:</label>
                <textarea class="form-control" id="inputDescription" placeholder="Enter something here. . ." name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-danger mt-3">Add new</button>
        </form>
    </div>
@endsection
