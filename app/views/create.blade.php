@extends('layouts.master')

@section('title')
@parent
| Create
@stop

@section('content')
<div class="container">
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
</div>
	


@stop