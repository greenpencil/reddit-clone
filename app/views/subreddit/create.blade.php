@extends('templates.default')

@section('sidebar')
@stop


@section('content')
    @foreach ($errors->all() as $message)
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong> {{ $message }}
        </div>
    @endforeach

    {{ Form::open(array('url' => 'handleNewSubreddit', 'method' => 'post', 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Create Subreddit</legend>
        <div class="form-group">
            {{Form::label('title','Name', array('class' => 'col-lg-2 control-label') )}}
            <div class="col-lg-10">
                {{Form::text('title', null, array('placeholder' => 'Subreddit name, this will also be your URL', 'class'=> 'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description','Description', array('class' => 'col-lg-2 control-label') )}}
            <div class="col-lg-10">
                {{Form::textarea('description', null, array('placeholder' => 'Publicly describe your subreddit for all to see', 'class'=> 'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('sidebar','Sidebar', array('class' => 'col-lg-2 control-label') )}}
            <div class="col-lg-10">
                {{Form::textarea('sidebar', null, array('placeholder' => 'Shown in the sidebar of your subreddit', 'class'=> 'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Create Subreddit</button>
            </div>
        </div>
    </fieldset>
    {{ Form::close() }}
@stop