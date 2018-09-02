@extends('layouts.app')

@section('content')
            @if (Route::has('login'))
                <div>
                    @auth
                        @if(Auth::user()->isadmin)
                        	<div>You are admin</div>
                        @else
                        	<div>You are a runner</div>
                        @endif
                    @else
                        <div><a href="{{ route('login') }}">Please Login</a></div>
                    @endauth
                </div>
            @endif
@endsection