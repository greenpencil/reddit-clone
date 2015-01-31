@extends('templates.default')


@section('content')
    <div class="col-lg-6">
        @foreach ($errors->all() as $message)
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ $message }}
            </div>
        @endforeach

        {{ Form::open(array('url' => '/login/register', 'method' => 'post', 'class' => 'form-horizontal')) }}
        <fieldset>
            <legend>Register</legend>
            <div class="form-group">
                {{Form::label('username','Username', array('class' => 'col-lg-2 control-label') )}}
                <div class="col-lg-10">
                    {{Form::text('username', null, array('placeholder' => 'Username', 'class'=> 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('password','Password', array('class' => 'col-lg-2 control-label') )}}
                <div class="col-lg-10">
                    {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('password_confirmation','Confirm', array('class' => 'col-lg-2 control-label') )}}
                <div class="col-lg-10">
                    {{Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class'=> 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('email','Email', array('class' => 'col-lg-2 control-label') )}}
                <div class="col-lg-10">
                    {{Form::text('email', null, array('placeholder' => 'Email', 'class'=> 'form-control'))}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </div>
        </fieldset>
        {{ Form::close() }}
    </div>

    <div class="col-lg-6">
        @foreach ($errors->all() as $message)
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ $message }}
            </div>
        @endforeach

        {{ Form::open(array('url' => '/login/process', 'method' => 'post', 'class' => 'form-horizontal')) }}
            <fieldset>
                <legend>Login</legend>
                <div class="form-group">
                    {{Form::label('username','Username', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('username', null, array('placeholder' => 'Username', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('password','Password', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::password('password', array('placeholder' => 'Password', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
@stop