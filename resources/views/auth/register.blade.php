@extends('layouts.app')

@section('content')

@if ($status == 'student')
    @include('auth/register_content/student_register')
@elseif ($status == 'hiring')
    @include('auth/register_content/hiring_register')
@endif


@endsection
