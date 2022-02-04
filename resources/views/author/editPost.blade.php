@extends('layouts.admin')

@section('title') Edit {{$posts->title}} @endsection

@section('content')
<div class="content">
           <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light">
                               Editing {{$posts->title}}
                            </div>

                     @if (Session::has('success'))
                         <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{"$error"}}</li>
                            @endforeach
                            </ul>
                        </div>  
                    @endif


                         <form action="{{route('authorEditPostSave', $posts->id)}}"  method="post"> 
                            @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="normal-input" class="form-control-label">Title</label>
                                                <input id="normal-input" name="title" class="form-control" value="{{$posts->title}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="placeholder-input" class="form-control-label">Content</label>
                                                <textarea name="content" rows="4" cols="50" id="txtid" class="form-control">{{$posts->content}}</textarea>
                                            </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Save Post</button>
                            </form>
                        </div>
                      
                    </div>
                </div>

            </div>
</div>

@endsection