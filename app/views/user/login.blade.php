@extends('templates.default')


@section('content')
    <div class="col-lg-6">
        {{ Form::open(array('url' => 'create', 'method' => 'post', 'class' => 'form-horizontal')) }}
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
                {{Form::label('password_confirm','Confirm', array('class' => 'col-lg-2 control-label') )}}
                <div class="col-lg-10">
                    {{Form::password('password_confirm', array('placeholder' => 'Confirm Password', 'class'=> 'form-control'))}}
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
        {{ Form::open(array('url' => 'processlogin', 'method' => 'post', 'class' => 'form-horizontal')) }}
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