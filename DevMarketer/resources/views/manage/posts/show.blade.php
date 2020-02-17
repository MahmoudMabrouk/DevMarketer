@extends('layouts.manage')

@section('content')
<div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{ $post->title }}</h1>
            </div>
            <div class="column">

                <a href="{{route('post.edit',$post->id)}}" class=" button is-primary is-pulled-right"><i class="fa fa-post m-r-5 "></i> Edit post</a>
            </div>
        </div>
        <hr class="m-t-5">

        <div class="columns">
            <div class="column is-three-quarters-desktop card">
                    <div class="field">
                        <label for="slug" class="label">Slug</label>
                        <p class="control m-l-40">
                            {{$post->slug}}
                        </p>
                    </div>
                    <div class="status-details">
                        <label for="status" class="label">Status</label>
                        <input type="hidden" value="">
                        <div class="block m-t-5 m-l-50">
                            <b-radio v-model="radio"
                                name="status"
                                native-value="published" disabled>
                                Published
                            </b-radio>
                            <b-radio v-model="radio"
                                name="status"
                                native-value="draft" disabled>
                                Draft
                            </b-radio>
                        </div>
                    </div>

                    <div class="field">
                        <label for="content" class="label">Content</label>
                        <div >
                            <img src="storeImage/{{$post->id}}" alt="{{$post->title}} image" style="height: 150px;">

                        </div>
                        <p class="control m-l-40">
                            {{$post->content}}
                        </p>
                    </div>

                    <div class="field">
                        <label for="created_at" class="label m-r-200" style="float: left;">Create At</label>
                        <p class="control m-l-40" style="float: left;">
                            {{$post->created_at->toFormattedDateString()}}
                        </p>
                        <label for="updated_at" class="label m-l-300" >Updated At</label>
                        <p class=" m-l-200" style="float: left;">
                            {{$post->updated_at->toFormattedDateString()}}
                        </p>
                    </div>
            </div>
            <div class="column is-one-quarters-desktop">
                <div class="card card-widget ">
                    <div class="auther-widget widget-area">
                        <div class="selected-auther">
                            <img src="#" alt="" class="is-pulled-left m-r-5">
                            <div class="auther">
                                <h4>By: </h4>
                                <p class="subtitle m-l-50">
                                    ({{ $post->user->name }})
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

@section('scripts')
    <script>
        var app = new Vue ({
            el: '#app',
            data:{
                radio: '{{ $post->status }}',
            },

        });
    </script>

@endsection
