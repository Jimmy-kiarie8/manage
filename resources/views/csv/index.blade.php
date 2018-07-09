@extends('layouts.app')

@section('content')
<myheader></myheader>
<div class="clearfix"></div>
<router-view></router-view>
<div id="csv" class="container wrap masthead">
  <div class="row">
    <!-- <div class="col-md-4"></div> -->
    <div class="col-md-6 col-md-offset-3">
      <div class="row jumbotron">
        <form action="{{route("import")}}" method="post" enctype="multipart/form-data">
           {{csrf_field()}}
          <div class="form-group">
              <input type="file" name="imported-file" class="btn btn-default"/>
          </div><br>
          <div class="form-group">
              <button class="btn btn-primary" type="submit">Import</button>
              or <a class="btn btn-default" href="http://manage.dev/manage#/admin/">Enter member details</a>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-2">
      <!-- <button class="btn btn-success">Export</button> -->
    </div>
  </div>
</div>
@endsection