<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;
use App\Models\Process;

class Purpose_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purpose_datas = Purpose::get();
        return view('purpose_list', ['purpose_datas' => $purpose_datas]);
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
            'status' => "draft", 
            // 'status' => $request->purpose_status, // wanna add 
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
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
