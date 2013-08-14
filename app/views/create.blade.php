@extends('layouts.master')

@section('title')
@parent
| Create
@stop

@section('styles')
	body {
		padding-top: 60px;
	}
@stop

@section('script')
	new Medium({
	    element: document.getElementById('article'),
	    mode: 'rich',
	    placeholder: 'Your Article'
	});
@stop

@section('content')
<div class="container">
	<div class="title" style="padding-top: 20px;">Create Post</div>
	<div class="container">
		<div class="input-group" style="padding-top:30px">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" name="title" placeholder="My Great Post">
		</div>
		<div class="container form-section">
		<span class="glyphicon glyphicon-paperclip"></span>
		<span class="header">&nbsp;Choose Photo</span>
		<hr>
		<div class="fileupload fileupload-new" data-provides="fileupload">
	 		<div class="input-group">
	    		<div class="uneditable-input span3">
	    			<i class="icon-file fileupload-exists"></i> 
	    			<span class="fileupload-preview"></span>
	    		</div>&nbsp;&nbsp;&nbsp;&nbsp;
	    		<span class="btn btn-file">
	    			<span class="fileupload-new btn btn-success">Select file</span>
	    			<span class="fileupload-exists btn btn-warning" style="position: relative;">Change</span>
	    				<input type="file" class="form-control"/>
	    			</span>&nbsp;&nbsp;
	    			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
	  			</div>
			</div>
		<hr>
	</div>
	<div class="container" style="margin-top: 30px">
		<span class="glyphicon glyphicon-pencil"></span>
		<span class="header">&nbsp;Write Post </span>
		<div id="article" class="textarea"></div>
	</div>
	</div>
	<div class="container form-section">
		<span class="glyphicon glyphicon-tags"></span>
		<span class="header">&nbsp;Tag Post</span>
		</p><input id="tags_1" class="form-control" name="tags" type="text" value=""/></p>	
	</div>
	<button class="btn btn-success form-control form-section" style="padding-top: 10px; padding-bottom: 26px">submit</button>
</div>
<div class="footer form-section">
<img src="img/kronicle-logo-ultralight.png" width="150px"/>
</div>


@stop