

@section('navbar')
@if (Route::has('login'))
    <div class="top-right links">
        @auth
       	 	<a href="{{ url('/index') }}">Welcome {{Auth::user()->name}}</a>
            <a href="{{ url('/index') }}">Home</a>
            @if(Auth::user()->isadmin)
            	<a href="{{ url('/index') }}">Foot Race</a>
            @endif
            <a href="{{ url('/auth/logout') }}">Logout</a>
         @endauth
    </div>
@endif