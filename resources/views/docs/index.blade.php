@extends('layouts.app')

@section('title')
Upload documents
@endsection


@section('content')
{{--<myheader></myheader>--}}
<div class="clearfix"></div>
<router-view></router-view>
<div class="wrap masthead">
	<a href="docs/create" class="btn btn-primary">Create</a>
</div>
@endsection
