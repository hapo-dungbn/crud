@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <div class="d-flex justify-content-center mb-4">
        <h1>Manage</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success show-message">
            {{ session('status') }}
        </div>
    @endif
    <div class="mb-3">
        <table class="table table-bordered table-hover table-dark m-0 mb-2">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Mail</th>
                <th>Contact</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->date_convert }}</td>
                    <td>{{ $project->gender ? 'Male' : 'Female' }}</td>
                    <td>{{ $project->mail }}</td>
                    <td>{{ $project->phone }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-success">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <input type="hidden" value="{{ $projects->currentPage() }}" name="currentPage">
                        </form>
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        {{ $projects->links() }}
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('projects.create') }}" class="btn btn-danger mr-2">Add new</a>
        <a href="{{ route('projects.trash') }}" class="btn btn-secondary">View trash</a>
    </div>
@endsection
