@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add a New Member</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="post" action="{{ url('/members') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="schools">Schools:</label>
            <select name="schools[]" class="form-control" multiple required>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>
</div>
@endsection
