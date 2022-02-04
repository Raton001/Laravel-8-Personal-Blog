@extends('layouts.admin')

@section('title') Author's Post @endsection

@section('content')
<div class="content">
 <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               Author Posts 
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach (Auth::user()->posts as $post ) 
                        <tr>
                            <td>{{$post->id}}</td>
                            <td class="text-nowrap"> <a href="{{route('singlePost', $post->id)}}">{{$post->title}}</a></td>
                            <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                             <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                            <td>{{$post->content}}</td>
                            <td>
                                <a href="{{route('authorEditPost', $post->id)}}" class="btn btn-warning">Edit</a>
                                <form style="display:none;" id="deletePost-{{$post->id}}" method="post" action="{{route('authordeletePost', $post->id)}}" >@csrf </form>
                                <a href="#" onclick="document.getElementById('deletePost-{{$post->id}}').submit();"  class="btn btn-danger">Remove</a>
                               
                            
                            </td>
                        </tr>
                     @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
