@extends('layout')
@section('title')
    Show
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-50 d-flex justify-content-end pr-3">
            <div class="w-50">
                <img src="{{ $project->avatar ? asset('storage/'.$project->avatar) : asset('/storage/default_avatar.png')  }}" class="w-100">
            </div>
        </div>
        <div class="w-50">
            <div>
                <span><b>Name:</b></span>
                <span>{{ $project->name }}</span>
            </div>
            <div>
                <span><b>Date of birth:</b></span>
                <span>{{ $project->date_convert }}</span>
            </div>
            <div>
                <span><b>Gender:</b></span>
                <span>{{ $project->gender ? 'Male' : 'Female' }}</span>
            </div>
            <div>
                <span><b>Email:</b></span>
                <span>{{ $project->mail }}</span>
            </div>
            <div>
                <span><b>Contact:</b></span>
                <span>{{ $project->phone }}</span>
            </div>
            <div>
                <span><b>Create at:</b></span>
                <span>{{ $project->creat_time }}</span>
            </div>
            <div>
                <span><b>Update at:</b></span>
                <span>{{ $project->update_time }}</span>
            </div>
            <div>
                <span><b>Description:</b></span>
                <span>{{ $project->description }}</span>
            </div>
        </div>
    </div>
@endsection
