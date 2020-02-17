@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title">Add New Blog Post</h1>
        </div>
    </div>
    <hr class="m-t-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>

    @endif
    <form action="{{route('post.store')}} " method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="columns">
            <div class="column is-three-quarters-desktop">
                <div class="column is-two-quarters-desktop">

                    <b-field>
                        <b-input type="text" placeholder="Post Title" size="is-medium" v-model="title" name="title"></b-input>
                    </b-field>

                    <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title"></slug-widget>
                    {{-- <input type="hidden" v-model="slug" name="slug" /> --}}

                    <b-field class="m-t-40">
                        <b-input rows="15" type="textarea" placeholder="Compose Your Masterpiece.... " name= "content"></b-input>
                    </b-field>
                </div>


            </div>
            <div class="column is-one-quarter-desktop is-narrow-tablet">

                <div class="box ">
                    <div>
                        <div class="file-upload-form">
                            Upload an image file:
                            <div class="m-l-30 m-t-10">
                                <input type="file" name="image" id="file" class="inputfile"  @change="previewImage" accept="image/*" />
                                <label for="file">Choose a file</label>
                            </div>
                        </div>
                        <div class="image-preview" v-if="imageData.length > 0">
                            <img class="preview" :src="imageData">
                        </div>
                    </div>
                </div>
                <div class="card card-widget ">
                        <div class="auther-widget widget-area">
                            <div class="selected-auther">
                                <img src="#" alt="" class="is-pulled-left m-r-5">
                                <div class="auther">
                                    <h4>By: </h4>
                                    <p class="subtitle m-l-50">
                                        ({{ auth()->user()->name }})
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="post-status-widget widget-area">
                            <div class="status">
                                <div class="status-icon">
                                    {{-- <b-icon icon="assignment" size= "is-medium"></b-icon> --}}
                                </div>
                            </div>
                            <div class="status-details">

                                <h4>Status</h4>
                                <div class="block m-t-5 m-l-50">
                                    <b-radio v-model="radio"
                                        name="status"
                                        native-value="published">
                                        Published
                                    </b-radio>
                                    <b-radio v-model="radio"
                                        name="status"
                                        native-value="draft">
                                        Draft
                                    </b-radio>
                                </div>
                            </div>
                        </div>
                        <div class="publish-button-widget widget-area">
                            <button class="button is-fullwidth is-primary" style="font-size: larger;">Publish</button>
                        </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection

@section('scripts')
    <script>
        var app = new Vue ({
            el: '#app',
            data:{
                title: '',
                radio: 'draft',
                imageData : '',
            },
            methods: {
                previewImage: function(event) {
                    // Reference to the DOM input element
                    var input = event.target;
                    // Ensure that you have a file before attempting to read it
                    //if (input.files && input.files[0]) {
                        // create a new FileReader to read this image and convert to base64 format
                        var reader = new FileReader();
                        // Define a callback function to run, when FileReader finishes its job
                        reader.onload = (e) => {
                            // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                            // Read image as base64 and set to imageData
                            this.imageData = e.target.result;
                        }
                        // Start the reader job - read file as a data url (base64 format)
                        reader.readAsDataURL(input.files[0]);
                    }
                //}
            }
        });
    </script>

@endsection
