@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Permissions</h1>
            </div>
            <div class="column">
                <a href="{{route('permission.create')}}" class="button is-primary is-pulled-right">Create New Permission</a>
            </div>
        </div>
        <hr class="m-t-5">
        <div class="card">
            <div class="card-content">
                <table class="table fl-table is-narrow">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Dispaly Name</td>
                            <td>Description</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{$permission->description}}</td>
                                <td >
                                    <a href="{{route('permission.show',$permission->id)}}" class="button is-outlined">Show</a>
                                    <a href="{{route('permission.edit',$permission->id)}}" class="button is-outlined">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection