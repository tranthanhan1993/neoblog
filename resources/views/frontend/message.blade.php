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
                <form role="form" method="POST" action="{{ url('/message') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">Message Form</h3>
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="row form-group">
                                <div class="col-md-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                                    <label>Message</label><em>*</em>
                                    <textarea class="form-control" rows="5" name="content" id="message">{{ old('message') ? old('message'):@$message }}</textarea>
                                     @if ($errors->has('content'))
                                    <span class="form-error">
                                        {{ $errors->first('content') }}
                                    </span>
                                    @endif
                                </div>  
                            </div>
                            <div class="" style="margin-top: 20px;">
                                <button class="btn btn-primary btn-block" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
@endsection
