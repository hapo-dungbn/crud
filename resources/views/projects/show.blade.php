@extends('layout')

@section('title')
    Show
@endsection

@section('content')

    <div>
        <div>
            <span>{{ $project->name }}</span>
        </div>
        <div class="d-inline-block">
            <img src="{{ asset('storage/'.$project->avatar) }}" class="w-50">
        </div>
    </div>


@endsection

