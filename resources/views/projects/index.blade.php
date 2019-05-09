@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="d-flex justify-content-center mb-4">
        <h1>Manage</h1>
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
                        <a href="/projects/{{ $project->id }}" class="btn btn-success">Show</a>
                    </td>
                    <td>
                        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="/projects/{{ $project->id }}">

                            @method('DELETE')

                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/projects/create" class="btn btn-danger">Add new</a>
    </div>
@endsection