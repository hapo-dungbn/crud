@extends('layout')
@section('title')
    Edit
@endsection
@section('content')
    <div class="mb-4">
        <h1>Edit</h1>
    </div>
    <div class="mb-3">
        <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="inputName">Name:</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputName" type="text" name="name" value="{{ $project->name }}">
                <h6 class="text-danger">{{ $errors->first('name') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputDate">Date of birth:</label>
                <input class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" id="inputDate" type="date" name="dob" value="{{ $project->dob }}">
                <h6 class="text-danger">{{ $errors->first('dob') }}</h6>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check form-check-inline">
                    <input class='form-check-input' id="inputMale" type="radio" name="gender" value="1" {{ $project->gender ? 'checked' : '' }}>
                    <label class="form-check-label" for="inputMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="inputFemale" type="radio" name="gender" value="0" {{ !$project->gender ? 'checked' : '' }}>
                    <label class="form-check-label" for="inputFemale">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label id="avatar">
                    <input type="file" name="avatar" class="d-none" for="avatar" id="profile-img">
                    <img id="profile-img-tag" src="{{ $project->avatar ? asset('storage/'.$project->avatar) : asset('/storage/defaultavatar.png')  }}" class="w-25">
                </label>
            </div>
            <div class="form-group">
                <label for="inputEmail">Mail:</label>
                <input class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" id="inputEmail" type="text" name="mail" value="{{ $project->mail }}">
                <h6 class="text-danger">{{ $errors->first('mail') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputPhone">Phone:</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="inputPhone" type="text" name="phone" value="{{ $project->phone }}">
                <h6 class="text-danger">{{ $errors->first('phone') }}</h6>
            </div>
            <div class="form-group">
                <label for="inputDescription">Description:</label>
                <textarea class="form-control" id="inputDescription" name="description">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-danger mt-3">Update</button>
        </form>
    </div>
@endsection
