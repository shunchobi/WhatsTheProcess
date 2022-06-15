<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class Process_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process_data = Process::get();

        return view('process controller from index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *  入力画面の生成とstoreへのデータの送信
     */
    public function create()
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
     * 情報を受け取り保存（一覧へリダイレクト）
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
    public function show($id)
    {
        $process_datas = Process::get();
        $target_process_datas = [];

        foreach ($process_datas as $key => $value){
            if($process_datas[$key]['purpose_id'] == $id){
                $index_num = $process_datas[$key]['id'] - 1;
                $target_process_datas[] = $process_datas[$index_num];
            }
        }

        return view('process_list', ['process_datas' => $target_process_datas]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
