@extends('layouts.manage')

@section('content')


<div class="flex-container ">

    <div class="columns is-multiline m-t-20">
        @foreach($posts as $post)
            <div class="column is-two-quarter">
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
                                <div class="column is-one-half" >
                                    <a href="{{route('post.show',$post->id)}}" class="button is-primary " style="float: right">See More Details</a>
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
