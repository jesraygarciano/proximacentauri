@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $opening->title }}</h1>
    <hr>
    <article>
        <h3>
        	<div class = "body">{{ $opening->requirements }}
    	</h3>
    </article>

    <br />
         
    <form role="form" method="POST" action="/auth/register/hiring">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                {!! Form::textarea('f_name', old('f_name'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Submit application
            </button>
        </div>
    </form>
</div>
@endsection
