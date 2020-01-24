@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">View Permission Details</h1>
        </div>
        <div class="column">
            <a href="{{route('permission.edit',$permissions->id)}}" class="button is-primary is-pulled-right">Edit Permission</a>
        </div>
        <hr class="m-t-5">
    </div>
    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p class="control">
                                <strong>{{$permissions->display_name}}</strong> <small>{{$permissions->name}}</small>

                                <br>
                                {{$permissions->description}}

                            </p>
                        </div>
                    </div>        
                </article>              
            </div>
        </div>
    </div>
</div>
@endsection