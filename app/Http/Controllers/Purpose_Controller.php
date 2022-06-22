<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;
use App\Models\Process;

class Purpose_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $purpose_datas = Purpose::get();
        $purposes = Purpose::with('process')->get();  
        // dd($purposes);     
        // dd($purposes[0]['process']);
        return view('purpose_list', ['purpose_datas' => $purposes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_purpose_list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save the purpose datas
        //save the process datas by loop
        //retun index();
        $purpose_new_datas = Purpose::create([
            'title' => $request->purpose_title,
            'status' => $request->purpose_status, 
        ]);
        
        $purpose_datas = Purpose::get();
        for ($i=0; $i < 10; $i++) { 
            Process::create([
                'purpose_id' => $purpose_new_datas['id'],
                'sort_number'  => $request->title[$i] == null ? "" : $i + 1,
                'title' => $request->title[$i] ?? "",
                'command' => $request->command[$i] ?? "",
                'description' => $request->description[$i] ?? "",
            ]); 
        }
        
        // return $this->index();
        return redirect(route('purpose.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * それぞれのpurposeのprocessの中で一番新しいアップデート日時と、それのpurpose.titleの値を取得するmysqlクエリ。
     * select purposes.title, max(processes.updated_at) from purposes inner join processes on purposes.id = processes.purpose_id group by title;
     * 
     *          title                 max(processes.updated_at)
     * 
     *   Git????????????               2022-06-20 00:11:14      
     *   Laravel???????Bootstrap?????  022-06-20 15:59:53      
     */
    public function show()
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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
        if($request['title'] == null){
            return redirect(route('process.show', $id));
        }

        $target_purposedata = Purpose::where('id', $id)->first();
        $target_purposedata->title = $request['title'];
        $target_purposedata->save();
        // dd($target_purposedata);
        
        return redirect(route('process.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purpose::where('id', $id)->delete();
    }
}
