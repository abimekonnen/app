<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Incident;
use App\Models\Atm;
use Carbon\Carbon;

//use Maatwebsite\Excel\Facades\Excel;
class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentTime(){
        return Carbon::now()->toDateTimeString();
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function index()
    {
        //$data = DB::table('atms')->get();
         
        // $searchStatus=false;
        // $one=false;
        //dd(date('d-m-y',strtotime("-3 days")));
        $searchQuery = request()->query('query');
        $date = request()->input('date');
        $delay = request()->query('delayQuery');
        $atms  = Atm::all();
        $currentDate2 = Carbon::now();
        $delayTime = 1;
        if($searchQuery){
            //dd(request()->query('query'));
            $search="true";
            $one="false";
            $delayT="false";
            $delayActive=" ";
            $searchActive =" active";
            $oneActive =" ";
            $incidents  = Incident::where('name','LIKE',"%{$searchQuery}%")->get();
            return view('atm',[
                'incidents'=>$incidents,
                'atms' => $atms,
                'search' =>$search,
                'one' =>$one,
                'delayT' => $delayT,
                'delayActive'=>$delayActive,
                'searchActive' =>$searchActive,
                'oneActive' =>$oneActive,
                'currentDate2' =>$currentDate2,
                'delayTime' => $delayTime
            ]);
        }elseif($date){
            $search="true";
            $one="false";
            $delayT="false";
            $delayActive=" ";
            $searchActive =" active";
            $oneActive =" ";
            $incidents  = Incident::where('created_at','LIKE',"%{$date}%")->get();
            return view('atm',[
                'incidents'=>$incidents,
                'atms' => $atms,
                'search' =>$search,
                'one' =>$one,
                'delayT' => $delayT,
                'delayActive'=>$delayActive,
                'searchActive' =>$searchActive,
                'oneActive' =>$oneActive,
                'currentDate2' =>$currentDate2,
                'delayTime' => $delayTime
            ]);
        }
        elseif($delay){
            $search="false";
            $one="false";
            $delayT="ture";
            $delayActive =" active";
            $searchActive ="";
            $oneActive =" ";
            $delayTime = $delay;
            // dd( $delayTime);
            $incidents  = Incident::where('status','not solved')->get();
            return view('atm',[
                'incidents'=>$incidents,
                'atms' => $atms,
                'search' =>$search,
                'one' =>$one,
                'delayT' => $delayT,
                'delayActive'=>$delayActive,
                'searchActive' =>$searchActive,
                'oneActive' =>$oneActive,
                'currentDate2' =>$currentDate2,
                'delayTime' => $delayTime
            ]);
        }
        else{
            $search="false";
            $one="true";
            $delayT="false";
            $delayActive=" ";
            $searchActive =" ";
            $oneActive =" active";
            $incidents  = Incident::all();
            return view('atm',[
              'incidents'=>$incidents,
              'atms' => $atms,
              'search' =>$search,
              'one' =>$one,
              'delayT' => $delayT,
              'delayActive'=>$delayActive,
              'searchActive' =>$searchActive,
              'oneActive' =>$oneActive,
              'currentDate2' =>$currentDate2,
              'delayTime' => $delayTime
             ]);
        }
        // $atms  = Atm::all();
        // $atms = Atm::where('name','=','audi')->get();
        // return view('atm',[
        //     'atms'=>$atms
        // ]);
       //return view('welcome')
       //$data = DB::select('select * from atms');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $atm = new Atm;
        // $atm->name = $request->input('name');
        // $atm->problem = $request->input('problem');
        // $atm->status = $request->input('status');
        // $atm->ticket = $request->input('ticket');
        // $atm->save();
        $this->validate($request,[
            'name'=>'required',
            'ticket' => 'required|unique:incident',
            'problem'=>'required',
        ]);
        $atm = Incident::create(
            [
                'name' => $request->input('name'),
                'problem' => $request->input('problem'),
                'ticket' => $request->input('ticket'),
                
            ]
        );
        // if(!$atm ){
        //     session()->flash('error', 'Category Canot be delleted it has posts');
        // }else{
        //     session()->flash('success', 'success test');
        // }
        return redirect('/atm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(equest $request,$id)
    {
        $query = $request->input('query');
        dd($query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidents = Incident::find($id)->first();
        //dd($atm);
        return view('atm')->with('incidents',$incidents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = $request->input('ticket');

        $this->validate($request,[
            'ticket' => 'required',
            'status'=>'required'
        ]);  
        $incidents = Incident::where('id',$id)->update(
            [
                'status' => $request->input('status'),
                'ticket' => $request->input('ticket'),
            ]
        );

        return redirect('/atm');
    }
    public function sh(Request $request){
        $query = $request->input('query');
        dd($query);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $incident = Incident::where('id', $id)->first();
        $incident->delete();
        return redirect('/atm');
    }

}
