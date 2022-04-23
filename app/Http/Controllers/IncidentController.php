<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Incident;
use App\Models\Atm;

//use Maatwebsite\Excel\Facades\Excel;
class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function index()
    {
        //$data = DB::table('atms')->get();
        //dd($data);
        // $searchStatus=false;
        // $one=false;
        //dd(date('d-m-y',strtotime("-3 days")));
        $search = request()->query('query');
        $date = request()->input('date');
        $atms  = Atm::all();
      
        if($search){
            //dd(request()->query('query'));
            $search="true";
            $one="false";
            $searchActive =" active";
            $oneActive =" ";
            $incidents  = Incident::where('name','LIKE',"%{$search}%")->get();
            return view('atm',[
                'incidents'=>$incidents,
                'atms' => $atms,
                'search' =>$search,
                'one' =>$one,
                'searchActive' =>$searchActive,
                'oneActive' =>$oneActive,
            ]);
        }elseif($date){
            $search="true";
            $one="false";
            $searchActive =" active";
            $oneActive =" ";
            $incidents  = Incident::where('created_at','LIKE',"%{$date}%")->get();
            return view('atm',[
                'incidents'=>$incidents,
                'atms' => $atms,
                'search' =>$search,
                'one' =>$one,
                'searchActive' =>$searchActive,
                'oneActive' =>$oneActive,
            ]);
        }
        else{
            $search="false";
            $one="true";
            $searchActive =" ";
            $oneActive =" active";
            $incidents  = Incident::all();
            return view('atm',[
              'incidents'=>$incidents,
              'atms' => $atms,
              'search' =>$search,
              'one' =>$one,
              'searchActive' =>$searchActive,
              'oneActive' =>$oneActive,
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
            // 'name'=>'required',
            // 'problem'=>'required',
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
        $incident = Incident::find($id)->first();
        $incident->delete();
        return redirect('/atm');
    }

}
