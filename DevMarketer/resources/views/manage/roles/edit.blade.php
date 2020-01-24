@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Edit {{$role->display_name}} </h1> 
        </div>
    </div>
    <hr class="m-t-5">
    <form action="{{route('role.update',$role->id)}}" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Roles:</h2>
                                <div class="field">
                                    <p class="control">
                                    <label for="display_name" class="label">Name (Readable)</label>
                                    
                                    <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                    <label for="name" class="label">Slug (can`t be edited)</label>
                                    
                                    <input type="text" class="input" name="name" value="{{$role->name}}" id="name" disabled>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                    <label for="description" class="label">Description</label>
                                    
                                    <input type="text" class="input" name="description" value="{{$role->description}}" id="description" >
                                    </p>
                                </div>
                                <input type="hidden" :value="permissionsSelected" name="permissions">
                            </div>
                        </div>        
                    </article>        
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                @foreach($permissions as $permission)
                                <div class="field">
                                    <b-checkbox v-model="permissionsSelected" native-value="{{$permission->id}}">{{$permission->display_name}} <em class="m-l-15">({{$permission->description}})</em></b-checkbox>
                                </div>
                                @endforeach
                            </div>
                        </div>        
                    </article>              
                </div><!--End the box-->
                
                <button class="button is-primary m-t-20">Save Changes to Role</button>      
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')

    <script>
        var app = new Vue({
            el: '#app',
            data :{
                permissionsSelected:{!!$role->permissions->pluck('id')!!}
            }
        });
    </script>
@endsection