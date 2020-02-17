@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title">Manage Posts</h1>
        </div>
        <div class="column">
            <a href="{{route('post.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-5"> Create Post</i></a>
        </div>
    </div>
    <hr class="m-t-5">
    <div class="columns is-multiline">
        @foreach($posts as $post)
            <div class="column is-one-quarter">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">

                                <h3 class="title">{{$post->title}}</h3>
                                <h4 class="subtitle">By: <em>{{$post->user->name}}</em></h4>
                                <div >
                                    <img src="post/storeImage/{{$post->id}}" alt="{{$post->title}} image" style="height: 100px;">

                                </div>
                                <p style="height: 80px; overflow: hidden;">
                                    {{$post->content}}
                                </p>
                            </div>
                            <div class="columns is-mobile">
                                <div class="column is-one-half">
                                    <a href="{{route('post.show',$post->id)}}" class="button is-primary is-fullwidth">Details</a>
                                </div>
                                <div class="column is-one-half">
                                    <a href="{{route('post.edit',$post->id)}}" class="button is-light is-fullwidth">Edit</a>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

        @endforeach
    </div>

    {{$posts->links('vendor.pagination.bulma')}}

</div>

@endsection
