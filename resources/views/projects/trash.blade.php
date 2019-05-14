@extends('layout')
@section('title')
    Trash
@endsection
@section('content')
    <div class="d-flex justify-content-center mb-4">
        <h1>Trash</h1>
    </div>
    <div class="mb-3">
        <table class="table table-bordered table-hover table-dark m-0">
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
                    <td>{{ $project->dob }}</td>
                    <td>{{ $project->gender ? 'Male' : 'Female' }}</td>
                    <td>{{ $project->mail }}</td>
                    <td>{{ $project->phone }}</td>
                    <td>
                        <form method="POST" action="{{ route('projects.restore', $project->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('projects.deleteforever', $project->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete forever</button>
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
        <a href="{{ route('projects.index') }}" class="btn btn-success">Home</a>
    </div>
@endsection
