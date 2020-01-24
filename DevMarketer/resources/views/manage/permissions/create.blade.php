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
            <div class="column">
                <form action="{{route('permission.store')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="block">
                        <b-radio v-model="permissionType" name="permission_type" native-value="basic">Basic Permission</b-radio>
                        <b-radio v-model="permissionType" name="permission_type" native-value="crud">CRUD Permission</b-radio>
                    </div>
                    <div class="field" v-if="permissionType == 'basic' ">
                            <label for="display_name" class="label">Name(Display Name)</label>
                            <p class="control">
                            <input type="text" name="display_name" class="input" id="display_name" > 
                            </p>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="name" class="label">Slug (must be like "create-users")</label>
                        <p class="control">
                        <input type="text" class="input" name="name" id="name">
                        </p>
                    </div>

                    <div class="field" v-if="permissionType == 'basic'">
                            <label for="description" class="label">Description</label>
                            <p class="control">
                            <input type="text" class="input" name="description" id="description" placeholder="Describe what this permission does">
                            </p>
                    </div>

                    <div class="field" v-if="permissionType == 'crud' ">
                            <label for="resource" class="label">Resource</label>
                            <p class="control">
                            <input type="text" name="resource" class="input" v-model="resource" id="resource" placeholder="The name of the resource"> 
                            </p>
                    </div>
                    <div class="columns is-one-quarter" v-if="permissionType =='crud'">
                        <div class="column ">
                            <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="create" class="m-b-20" > Create</b-checkbox>
                            </div>
                            <div class="field">                    
                                    <b-checkbox v-model="crudSelected" native-value="read" class="m-b-20" > Read</b-checkbox>
                            </div>
                            <div class="field">                    
                                    <b-checkbox v-model="crudSelected" native-value="update" class="m-b-20" > Update</b-checkbox>
                            </div>
                            <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="delete" class="m-b-20" > Delete</b-checkbox>                    
                            </div>
                        </div>
                    
                        <input type="hidden" name="crud_selected" :value="crudSelected">

                        <div class="column">
                                <table class="table fl-table is-narrow" >
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Slug</td>
                                            <td>Description</td>
                                        </tr>
                                    </thead>
                                    <tbody v-if="resource.length >= 3 ">
                                        <tr v-for="item in crudSelected">
                                            <td v-text="curdName(item)"></td>
                                            <td v-text="curdSlug(item)"></td>
                                            <td v-text="curdDec(item)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <button class="button is-success ">Create Permission</button>
                </form>    
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        var app=new Vue({
            el: '#app',
            data: {
                permissionType :'basic',
                resource       : '',
                test           : 'Test',
                crudSelected   : ['create','read','update','delete'],
            },
            methods:{
                curdName : function(item){
                    return item.substr(0,1).toUpperCase() + item.substr(1) + ' ' + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                curdSlug : function(item){
                    return item.toLowerCase() + '-' + app.resource.toLowerCase();
                },
                curdDec : function(item){
                    return 'Allow a User to '+item.substr(0,1).toUpperCase() + item.substr(1) + ' a ' + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
            }
        });
    </script>

@endsection