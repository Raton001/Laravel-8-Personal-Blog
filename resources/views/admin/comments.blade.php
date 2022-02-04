@extends('layouts.admin')
@section('title') Admin's Comments @endsection
@section('content')

<div class="content">
 <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-light">
               Admin Comments 
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach ($comments as $comment ) 
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td class="text-nowrap"> <a href="{{route('singlePost', $comment->id)}}">{{$comment->post->title}}</a></td>
                            <td>{{$comment->content}}</td>
                            <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                            <td>
                            <form id="deleteComment-{{$comment->id}}" action="{{route('CommentsDelete', $comment->id)}}"  method="post">@csrf</form>
                                <a href="#"  onclick="document.getElementById('deleteComment-{{$comment->id}}').submit();">X</a>
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