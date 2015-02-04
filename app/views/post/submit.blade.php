@extends('templates.default')


@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#link" data-toggle="tab">Link</a></li>
        <li><a href="#text" data-toggle="tab">Text</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="link">
            @foreach ($errors->all() as $message)
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endforeach

            {{ Form::open(array('url' => '/post/new', 'method' => 'post', 'class' => 'form-horizontal')) }}
            <fieldset>
                <legend>Submit Link</legend>
                <div class="form-group">
                    {{Form::label('title','Title', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('title', null, array('placeholder' => 'Title', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('url','URL', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('url', null, array('placeholder' => 'URL', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('subreddit','Subreddit', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('subreddit', null, array('placeholder' => 'Subreddit', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="suggestions">
                    {{Form::label(null,'Suggestions', array('class' => 'col-lg-2 control-label') )}}
                <ul>
                    {{ Form::hidden('type','0') }}
                    <div class="col-lg-10">
                    @foreach($subreddits as $subreddit)
                        <li><a href="javascript:;" onclick="document.getElementById('subreddit').value='{{$subreddit->title}}';">{{$subreddit->title}}</a>&nbsp;&nbsp;</li>
                    @endforeach
                    </div>
                </ul>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Submit Post</button>
                    </div>
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
        <div class="tab-pane fade in" id="text">
            @foreach ($errors->all() as $message)
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endforeach

            {{ Form::open(array('url' => '/post/new', 'method' => 'post', 'class' => 'form-horizontal')) }}
            <fieldset>
                <legend>Submit Link</legend>
                <div class="form-group">
                    {{Form::label('title','Title', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('title', null, array('placeholder' => 'Title', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('text','Text', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::textarea('text', null, array('placeholder' => 'Text', 'class'=> 'form-control', 'lines'=> '4'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('subreddit1','Subreddit', array('class' => 'col-lg-2 control-label') )}}
                    <div class="col-lg-10">
                        {{Form::text('subreddit1', null, array('placeholder' => 'Subreddit', 'class'=> 'form-control'))}}
                    </div>
                </div>
                <div class="suggestions">
                    {{Form::label(null,'Suggestions', array('class' => 'col-lg-2 control-label') )}}
                    <ul>
                        {{ Form::hidden('type','1') }}
                        <div class="col-lg-10">
                            @foreach($subreddits as $subreddit)
                                <li><a href="javascript:;" onclick="document.getElementById('subreddit1').value='{{$subreddit->title}}';">{{$subreddit->title}}</a>&nbsp;&nbsp;</li>
                            @endforeach
                        </div>
                    </ul>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Submit Post</button>
                    </div>
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@stop