@extends('frontend.layouts.master')


@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">
 
            <div class="col-lg-8 col-lg-offset-2 form" style="">
                
                @if($errors->any()) 
                <ul class="errors alert alert-danger alert-dismissable" style="margin-top: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form role="form" method="POST" action="{{ url('profile', Auth::user()->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}    
                    <h3 class="form-title" style="text-align: center">My profile Form</h3>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2"> 
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name}}">
                                    @if ($errors->has('name'))
                                    <span class="form-error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email}}" disabled>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Avatar</label>
                                    <input type="file" name="avatar">
                                </div>
                            </div>
                            @if (Auth::user()->id == $user->id)
                            <div class="" style="margin-top: 20px;">
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
