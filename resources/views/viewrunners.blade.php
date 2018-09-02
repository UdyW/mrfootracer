@extends('layouts.app')

@section('content')

<div class="panel panel-default">
<div class="panel-body">
@if (count($runners) > 0)
<div class="panel-heading">Update Runners times for foot race id {{$id}}</div>
<table class="u-full-width">
    <thead>
        <th>Runner Name</th>
        <th>Finish Time</th>
    </thead>
@foreach ($runners as $runner)
    <tr>
    	<td>{{ $runner[1]->name }}</td>
    	<td>
    	<div style="display: inline-flex;">
             <form action="../updaterunners" method="post">
                         {!! csrf_field() !!}
        		<input type="text" name="finishtime" id="duration" value="{{$runner[0]->finishtime}}">
        		<input type="hidden" name='id' value={{$runner[0]->id}}>
                <button type="submit" value='Update'>Update</button>
            </form>
            <form action="../unassignrunners/{{ $runner[0]->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        
                <button>Un-assign</button>
            </form>
        </div>
        </td>
    </tr>
@endforeach
</table>
@endif
<div class="panel-heading">Add Runners for foot race id {{$id}}</div>
<table class="u-full-width">
@foreach ($others as $user)
<tr>
	<td><div style="display: inline-flex;">
     <form action="../assignrunners" method="post">
                 {!! csrf_field() !!}
		<input type="hidden" name="userid" value="{{$user->id}}"><label style="display:inline;">{{ $user->name }}</label>
		<input type="hidden" name='raceid' value={{$id}}>
        <button type="submit" value='Assign'>Assign</button>
    </form></div>
    </td>
</tr>
@endforeach
</table>
</div>
</div>
@endsection