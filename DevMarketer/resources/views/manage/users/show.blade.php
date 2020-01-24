@extends('layouts.manage')

@section('content')
<div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">View User Details</h1>
            </div>
            <div class="column">
                
                <a href="{{route('users.edit',$user->id)}}" class=" button is-primary is-pulled-right"><i class="fa fa-user m-r-5 "></i> Edit User</a>
            </div>
        </div>
        <hr class="m-t-5">

        <div class="columns">
            <div class="column">
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control m-l-40">
                            {{$user->name}}
                        </p>
                       
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email</label>
                        <p class="control m-l-40">
                            {{$user->email}}
                        </p>
                       
                    </div>
                    <div class="field">
                        <label for="created_at" class="label">Create At</label>
                        <p class="control m-l-40">
                            {{$user->created_at->toFormattedDateString()}}
                        </p>
                    </div>
                    <div class="field">
                        <label for="roles" class="label">Roles : </label>
                            {{$user->roles->count() == 0 ? 'This user "'.$user->name.'"  has no Roles to show it ':''}}
                            <ul>
                            @foreach($user->roles as $role)
                                <li>{{$role->display_name}} ({{$role->description}})</li>
                            @endforeach
                            </ul>
                    </div>
            </div>
        </div>
</div>

@endsection