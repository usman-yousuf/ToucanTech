@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of School</h1>
    <div class="float-right">
        <a href="{{ route('add.members')}}" type="button" class="btn btn-primary">Add New Member</a>
    </div>
    <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">School Name</th>
            <th scope="col">Number of Members</th>
          </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
                <tr>
                    <td><a href="{{ route('members.by.school', ['school' => $school->id]) }}">{{ $school->school_name }}</a></td>
                    <td>
                        {{ $school->members->count() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{ route('download.members.csv') }}" class="btn btn-primary">Download CSV</a>
    </div>
</div>
@endsection
