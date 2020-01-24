@extends('layouts.manage')
@section('content')
    <div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
            
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column ">
                <a href="{{route('users.create')}}" class="button is-primary is-pulled-right"> <i class="fa fa-user-add m-r-10">Create New User</i></a>
            </div>
        </div>
        <hr class="m-t-5">

        <div class="card">
            <div class="card-content">
                <table class="table fl-table is-narrow">
                    <thead>
                        <tr>
                            <td> ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Data Created</td>
                            <td></td>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->toFormattedDateString()}}</td>
                                <td class="has-text-right">
                                    <a href="{{route('users.show',$user->id)}}" class="button is-outlined">Show</a>
                                    <a href="{{route('users.edit',$user->id)}}" class="button is-outlined">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination is-rounded m-t-20 m-l-20">

        </div>
            {{$users->links('vendor.pagination.bulma')}}
    </div>

@endsection