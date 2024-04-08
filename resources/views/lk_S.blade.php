@extends('layouts.student')
@section('content')
@extends('layouts.lk')

@if(Auth::user()->role == 'teacher')


@endif

@endsection