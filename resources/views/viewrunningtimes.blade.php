@extends('layouts.app')

@section('content')
        @if (count($runnerTimes) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Foot Races
            </div>

            <div class="panel-body">
                <table class="u-full-width">

                    <!-- Table Headings -->
                    <thead>
                        <th>Runner Name</th>
                        <th>Finishing Time</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($runnerTimes as $runner)
                    <tr
                    @if(auth()->user()->name == $runner[0]) bgcolor = '#ccccff' @endif
                    >
                    	<td class="table-text">
                            <div>{{$runner[0]}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$runner[1]}}</div>
                        </td>
                     </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
@endsection