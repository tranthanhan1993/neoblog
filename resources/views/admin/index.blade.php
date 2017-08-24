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
                    <a href="#">
                        <h2>POSTS HERE</h2>
                        <p>Toltal Post: </p> <span>3<span>    
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="#">
                        <h2>TAGS HERE</h2>
                        <p>Toltal Tags: </p> <span>3<span>    
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-admin">
                    <a href="#">
                        <h2>USERS HERE</h2>
                        <p>Toltal User: </p> <span>3<span>    
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection