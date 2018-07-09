@extends('layouts.app')

@section('title')
Manage
@endsection


@section('content')
<myheader></myheader>
<div class="clearfix"></div>
<router-view></router-view>
<div class="wrap masthead">
<div id="create" class="column is-6 col-offset-4">
    <form action="{{route('docs.store')}}" method="post" enctype="multipart/form-data">
    	{{csrf_field()}}
        <div class="form-group">
        	<div class="form-group">
        		<label for="title">Title</label>
        		<input type="text" name="title" class="form-control">
        	</div>
        	<div class="form-group">
        		<label for="file">file</label>
            	<input type="file" name="file">
        	</div>
        </div>
        <input class="btn btn-success" type="submit" value="Upload file" name="submit">
    </form>
</div>
</div>
@endsection
