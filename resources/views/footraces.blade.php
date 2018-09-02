@extends('layouts.app')

@section('content')

<script  type="text/javascript">
	$(document).ready(function(){
		$('#footrace-startdate').datepicker({ dateFormat: 'yy-mm-dd'}); 
		$('#footrace-starttime').timepicker(); 
	});
</script>
@if(auth()->user()->isadmin == 1)
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
            <div class="panel-heading">
                Add New Foot Race
            </div>
        <!-- New Foot Race Form -->
        <form action="./addfootrace" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="footrace-startdate" class="col-sm-3 control-label">Start Date</label>
				<div class="col-sm-6">
                    <input type="text" name="startdate" id="footrace-startdate" class="form-control">
                </div>
                
                <label for="footrace-starttime" class="col-sm-3 control-label">Start Time</label>
				<div class="col-sm-6">
                    <input type="text" name="starttime" id="footrace-starttime" class="form-control">
                </div>
                
                <label for="footrace-location" class="col-sm-3 control-label">Location</label>
                <div class="col-sm-6">
                    <input type="text" name="location" id="footrace-location" class="form-control">
                </div>
                
                <label for="footrace-distance" class="col-sm-3 control-label">Distance(miles)</label>
                <div class="col-sm-6">
                    <input type="text" name="distance" id="footrace-distance" class="form-control">
                </div>
                
                <label for="footrace-description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="footrace-description" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Foot Race
                    </button>
                </div>
            </div>
        </form>
    </div>
@endif
    <!-- Current Foot Races -->
        @if (count($footraces) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Foot Races
            </div>

            <div class="panel-body">
                <table class="u-full-width">

                    <!-- Table Headings -->
                    <thead>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>Location</th>
                        <th>Distance</th>
                        <th>Description</th>
                        <th></th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($footraces as $footrace)
                            <tr>
                                <!-- Foot Race Name -->
                                <td class="table-text">
                                    <div>{{ date('Y-m-d', strtotime($footrace->startdate))}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$footrace->starttime}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $footrace->location }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $footrace->distance }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $footrace->description }}</div>
                                </td>
                                @if(auth()->user()->isadmin == 1)
                                <td>
                                     <form action="./deletefootrace/{{ $footrace->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                            
                                        <button>Delete</button>
                                    </form>
                                </td>
                                <td>
                                     <form action="./viewrunners/{{ $footrace->id }}" method="GET">
                                     {{ csrf_field() }}
                                        <button>Assign Runners</button>
                                    </form>
                                </td>
                                @else
                                <td>
                                     <form action="./viewrace/{{ $footrace->id }}" method="GET">
                                     {{ csrf_field() }}
                                        <button>View</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
    <div>
     	<div class="panel-heading">
               You still don't have any foot races assigned :(
               <br>
               Check again later.
        </div></div>
    @endif
@endsection