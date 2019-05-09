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
                <span>Photo:</span>
                <div>
                    <input type="file" name="avatar">
                </div>
            </div>
            <div>
                <span>Name:</span>
                <div>
                    <input type="text" name="name">
                </div>
            </div>
            <div>
                <span>Date of birth:</span>
                <div>
                    <input type="text" name="dob">
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
                <span>Mail:</span>
                <div>
                    <input type="text" name="mail">
                </div>
            </div>
            <div>
                <span>Phone:</span>
                <div>
                    <input type="text" name="phone">
                </div>
            </div>
            <div>
                <span>Description:</span>
                <div>
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger">Add new</button>
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