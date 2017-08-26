@extends('frontend.layouts.master')


@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 left-content" style="padding-bottom: 60px;">
                    <h3 class="form-title" style="font-size: 24px; text-align: center">My profile Form</h3>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2"> 
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Name:</label> {{$user->name}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Email:</label> {{$user->email}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Avatar:</label> 
                                    <img src="{{$user->getAvatarPath()}}" style="width: 80px;height: 80px;">
                                </div>
                            </div>
                            @if(Auth::user()->role != 1)
                                <div class="" style="margin-top: 20px;">
                                    <a class="btn btn-primary btn-block" href="profile/edit">Edit profile</a>
                                </div>
                            @endif
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>
@endsection
