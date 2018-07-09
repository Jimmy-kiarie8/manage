@extends('layouts.app')

@section('content')
{{--<myheader :username="{{ Auth::user() }}"></myheader>--}}
<div class="clearfix"></div>
<div id="app" class="container">
    <div id="blade">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn btn-danger">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <a href="/manage" class="btn btn-primary pull-right">Back</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <file-management :settings="{{ json_encode($props) }}"></file-management>
                    </div>
                    <div class="col-md-12">
                        <attachment-list :settings="{{ json_encode($props) }}"></attachment-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
