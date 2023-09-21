@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Members of {{ $school->school_name }}</h1>
    <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">Member Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }} </td>
                    <td>{{ $member->email }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
