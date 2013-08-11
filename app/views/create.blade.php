@extends('layouts.master')

@section('title')
@parent
| Create
@stop

@section('content')
<div class="container">
<<<<<<< HEAD
	<form>
		<p><label>Defaults:</label>
		<input id="tags_1" type="text" value="foo,bar,baz,roffle" /></p>
		
		<p><label>Technologies: (Programming languages in yellow)</label>
		<input id="tags_2" type="text" class="tags form-control" value="php,ios,javascript,ruby,android,kindle" /></p>
		
		<p><label>Autocomplete:</label>
		<input id='tags_3' type='text' class='tags'></p>
		
	</form>

	<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" >×</a>
</div>
=======
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
		<div class="input-group" style="padding-top:30px">
			<textarea  class="textarea form-control" name="message" id="textarea" cols="100" rows="10" placeholder="Your Message"></textarea>
		</div>
	</div>
	<div class="container form-section">
		<span class="glyphicon glyphicon-tags"></span>
		<span class="header">&nbsp;Tag the post</span>
		</p><input id="tags_1" class="form-control" name="tags" type="text" value=""/></p>	
	</div>
	<button class="btn btn-success form-control form-section" style="padding-top: 10px; padding-bottom: 26px">submit</button>
</div>
<div class="footer form-section">
<img src="img/kronicle-logo-ultralight.png" width="150px"/>
>>>>>>> c82a443a5489483351d842075e3e223ebc8353ae
</div>


@stop