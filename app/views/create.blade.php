@extends('layouts.master')

@section('title')
@parent
| Create
@stop

@section('content')
<div class="container">
	<div class="title">Create Post</div>
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
	<div class="container form-section">
		<span class="glyphicon glyphicon-tags"></span>
		<span class="header">&nbsp;Tag the post</span>
		</p><input id="tags_1" class="form-control" name="tags" type="text" value=""/></p>	
	</div>
</div>
	


@stop