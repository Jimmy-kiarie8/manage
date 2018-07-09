@extends('layouts.app')

@section('title')
Admin
@endsection


@section('content')
<myheader></myheader>
<div class="clearfix"></div>
<router-view></router-view>
<myadmin></myadmin>
@endsection
