@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create New Permission</h1>
            </div>
        </div>
        <hr class="m-t 0">
        <div class="columns">
        @if(Session::has('error'))
                <div class="column">
                    <p class="control alert alert-danger">
                        {{Session::get('error')}}
                    </p>
                </div>
            @endif
            <div class="column">
                <form action="{{route('permission.update',$permission->id)}}" method="POST" >
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="field" v-if="permissionType == 'basic' ">
                            <label for="display_name" class="label">Name(Display Name)</label>
                            <p class="control">
                            <input type="text" name="display_name" class="input" id="display_name"  value="{{$permission->display_name}}"> 
                            </p>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="name" class="label">Slug</label>
                        <p class="control">
                        <input type="text" class="input" name="name" id="name"  value="{{$permission->name}}">
                        </p>
                    </div>

                    <div class="field" v-if="permissionType == 'basic'">
                            <label for="description" class="label">Description</label>
                            <p class="control">
                            <input type="text" class="input" name="description" id="description"  value="{{$permission->description}}">
                            </p>
                    </div>
                    <button class="button is-success m-t-10">Update Permission</button>
                </form>
            </div>
        </div>
    </div>

@endsection