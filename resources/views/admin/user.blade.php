@extends('layouts.admin')
@section('title') Admin's User @endsection
@section('content')

<div class="content">
 <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
               Admin User
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Post</th>
                            <th>Comments</th>
                            <th>Created At</th>
                             <th>Updatedted At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach ($users as $user ) 
                        <tr>
                            <td>{{$user->id}}</td>
                             <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->posts->count()}}</a></td>
                            <td>{{$user->comments->count()}}</td>
                            <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                             <td>{{\Carbon\Carbon::parse($user->updatedted_at)->diffForHumans()}}</td>
                            <td>
                            <form id="deleteUser-{{$user->id}}" action="{{route('admindeleteUser',$user->id)}}"  method="post">@csrf</form>
                              <button class="btn btn-danger" onclick="document.getElementById('deleteUser-{{$user->id}}').submit();">Remove</button>   
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