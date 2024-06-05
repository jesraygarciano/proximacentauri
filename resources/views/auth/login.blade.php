@extends('layouts.main-layout')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <br>
                                <a href="{{url('/redirect','facebook').(isset($_GET['re_url']) ? '?re_url='.$_GET['re_url'] : '')}}" style="display: block;">
                                    <div class="input-group" style="border: 1px solid #cecece; width: 100%; padding: 5px; border-left: 6px solid #0b5390;">
                                      <i class="fa fa-3x fa-facebook-square" style="color:#326087; vertical-align: middle;"></i> <b> Login Using Facebook</b>
                                    </div>
                                </a>
                                <a href="{{url('/redirect','github').(isset($_GET['re_url']) ? '?re_url='.$_GET['re_url'] : '')}}" style="display: block; color: black;">
                                    <div class="input-group" style="margin-top:5px; border: 1px solid #cecece; width: 100%; padding: 5px; border-left: 6px solid #5e5e5e;">
                                      <i class="fa fa-3x fa-github-square" style="color:#000000; vertical-align: middle;"></i> <b> Login Using Github</b>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
