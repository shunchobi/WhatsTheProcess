<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;
use App\Models\Purpose;

class Process_Controller extends Controller
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
        $process_data = Process::get();

        return view('process controller from index');
        // return view('layout_test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * データベースから---GET--- 
     * データベースからデータをゲットし、Viewを新規作成（create）する。
     *  
     */
    public function create(Request $request)
    {
        Process::create([
            'purpose_id' => $request->purpose_id,
            'sort_number' => $request->sort_number,
            'title' => $request->title,
            'command' => $request->command,
            'description' => $request->description,
        ]);

        return response()->json(['success'=>'Process Form is successfully submitted!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * データベースへ---POST---
     * データベースに保存したいデータを受け取り、保存。
     * そのあとViewを返すかどうかは任意とし、メインにやりたいことは
     * サーバーへのデータ保存
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // $id = purpose.id
    {

        $purpose_data = Purpose::with('process')->find($id);
        $process_datas = $purpose_data->process;

        return view('process_list', [
            'process_datas' => $process_datas,
            'purpose' => $purpose_data,
            'purpose_title' => $purpose_data->title,
            'purpose_id' => $purpose_data->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // dd($request);
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
        $targetList = Process::where('id', $id)->first();
        $targetList->title = $request->title;
        $targetList->command = $request->command;
        $targetList->description = $request->description;
        $targetList->save();

        // return $this->show($targetList->purpose_id);
        return redirect(route('process.show', $targetList->purpose_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //$id = process.id
    {

        $process = Process::with('purpose')->get();  
        $purposeId = Process::find($id)->purpose_id;
        Process::find($id)->delete();

        return redirect(route('process.show', $purposeId));
    }
}
