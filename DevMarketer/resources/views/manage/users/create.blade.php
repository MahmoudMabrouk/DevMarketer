@extends('layouts.manage')

@section('content')

<div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New User</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            @if(Session::has('danger'))
                <div class="column">
                    <p class="control alert alert-danger">
                        {{Session::get('danger')}}
                    </p>
                </div>
            @endif
            <div class="column">
                <form action="{{route('users.store')}} " method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input class="input" type="text" name="name" id="name"  required>
                        </p>                       
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <p class="control">
                            <input class="input" type="text" name="email" id="email"  required>
                        </p>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input class="input" type="password" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user" >
                            <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
                        </p>                      
                    </div>
                   
                    <button class="button is-success m-t-5"> Create User</button>
                </form>
            </div>
        </div>
</div>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
      }
    });
  </script>
@endsection
