<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FootRace;
use App\FootRaceRunner;
use App\User;

class FootRaceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function addfootrace(Request $request){
        $this->validate($request, [
            'startdate' => 'required|date',
            'starttime' => 'required',
            'location' => 'required',
            'distance' => 'required'
        ]);
       
        $footRace = FootRace::create(array(
            "location"=>$request->location, 
            "startdate"=>$request->startdate, 
            "starttime"=>date("H:i", strtotime($request->starttime)), 
            "distance"=>$request->distance, 
            "description"=>$request->description));
        return redirect('/index');
    }
    
    public function viewfootraces() {
        $footRaces =array();
        if(auth()->user()->isadmin == 1){
            $footRaces = FootRace::orderBy('created_at', 'asc')->get();
        }
        else{
            $footRacesForUser = FootRaceRunner::where('runnerid',auth()->user()->id)->get();
            foreach ($footRacesForUser as $race){
                array_push($footRaces, FootRace::where('id',$race->footraceid)->first());
            }
        }
        return view ('footraces',[
            'footraces'=>$footRaces
        ]);
    }
    
    public function viewrunners($id){
        $users = User::where('isadmin', '0')->get();
        $footracerunners = array();
        $others= array();
        foreach($users as $user){
            $assigned = FootRaceRunner::where([['footraceid',$id], ['runnerid',$user->id]])->count();
            if($assigned==1){
                array_push($footracerunners, [FootRaceRunner::where([['footraceid',$id], ['runnerid',$user->id]])->first(),$user]);
            }
            else array_push($others, $user);
        }
        return view ('viewrunners',[
            'id'=>$id,
            'runners'=>$footracerunners,
            'others' =>$others
        ]);
    }
    
    public function viewrace($id){
        $allRunners = FootRaceRunner::where('footraceid',$id)->get();
        $runnerTimes = array();
        foreach ($allRunners as $runner){
            array_push($runnerTimes, [User::where('id',$runner->runnerid)->first()->name,$runner->finishtime]);
        }
        
        return view('viewrunningtimes',[
            'footrace'=>FootRace::where('id',$id)->first(),
            'runnerTimes'=>$runnerTimes
        ]); 
    }
    
    public function updaterunners(Request $request){
        $racerunner = FootRaceRunner::find($request->id);
        $racerunner->finishtime = $request->finishtime;
        $racerunner->save();
        return redirect('/viewrunners/'.$racerunner->footraceid);
    }
    
    public function assignrunners(Request $request){
        $footrace_runner = FootRaceRunner::create(array(
            "footraceid"=>$request->raceid,
            "runnerid"=>$request->userid
            ));
        return redirect('/viewrunners/'.$request->raceid);
    }
    
    public function unassignrunners($id) {
        $raceid = FootRaceRunner::where('id',$id)->first()->footraceid;
        FootRaceRunner::findOrFail($id)->delete();
        
        return redirect('/viewrunners/'.$raceid);
    }
    
    public function deletefootrace($id) {
        FootRace::findOrFail($id)->delete();
        
        return redirect('/index');
    }
}
