@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
          <div class="col-md-12">
            <h3 class="admin-header">Welcome to admin page</h3>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="admin/post">
                        <h2>POSTS HERE</h2>
                        <p>Toltal Post: </p> <span>{{$totalPost}}<span>    
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="admin/tag">
                        <h2>TAGS HERE</h2>
                        <p>Toltal Tags: </p> <span>{{$totalTag}}<span>    
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="admin/comment">
                        <h2>COMMENTS HERE</h2>
                        <p>Toltal Comments: </p> <span>{{$totalComment}}<span>    
                    </a>
                </div>
            </div>    
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="admin/message">
                        <h2>MESSAGES HERE</h2>
                        <p>Toltal Message: </p> <span>{{$totalMessage}}<span>    
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection