@extends('layouts.manage')

@section('content')

<div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="colums">
            <div class="column">
            @if(Session::has('error'))
                <div class="column">
                    <p class="control alert alert-danger">
                        {{Session::get('error')}}
                    </p>
                </div>
            @endif
            </div>
        </div>
           
        <form action="{{route('users.update',$user->id)}}" method="POST">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label for="name" class="label">Name:</label>
                        <p class="control">
                            <input class="input" type="text" name="name" value="{{$user->name}}" id="name"  required>
                        </p>
                       
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <p class="control">
                            <input class="input" type="text" name="email" value="{{$user->email}}" id="email"  required>
                        </p>
                       
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input class="input" type="password" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user" >
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Keep Password</b-checkbox>
                        </p>   
                    </div>
                </div>
                <div class="column m-l-50">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Roles:</h2>
                                <input type="hidden" name="roles" :value="rolesSelected" />
                                @foreach($roles as $role)
                                    <div class="field">
                                        <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}">{{$role->display_name}} <em class="m-l-15">({{$role->description}})</em></b-checkbox>
                                    </div>
                                @endforeach
                            </div>
                        </div>        
                        </article>              
                </div>
            </div>
            <div class="colums">
                <div class="column">
                    <button class="button is-success m-t-5" style="width: 250px;">  update User</button>
                
                </div>
            </div>    
                
        </form>
    
</div>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
        rolesSelected:{!!$user->roles->pluck('id')!!}
      }
    });
  </script>
@endsection