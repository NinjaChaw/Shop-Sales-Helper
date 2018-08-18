@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            All Users
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->role == 'admin')
                            <td>{{ $user->role }}</td>
                        @elseif($user->role == 'saler')
                            <td>{{ $user->role }} <a href="{{ route('user.make.subscriber', $user->id) }}" class="btn btn-danger btn-xs">Make subscriber</a></td>
                        @else
                            <td>{{ $user->role }} <a href="{{ route('user.make.saler', $user->id) }}" class="btn btn-success btn-xs">Approve as Saler</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
