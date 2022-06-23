<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;
use App\Models\Process;
use App\Models\User;

class Purpose_Controller extends Controller
{

    public function __construct()
    {
        //routeにmiddlewareをすでに指定しているため、ここにはいらない
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //below comment code, Get all purpose data with related process data.
        // $purposes = Purpose::with('process')->get(); 

        //Get purpose data that is belong to my user account
        $purposes = auth()->user()->purpose;

        // dd(User::with('purpose', 'process')->get());
        
        return view('purpose_list', ['purpose_datas' => $purposes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //現在ログインしているユーザーにのみに紐づくpurposes processes データの取得
        // $alluser_and_allpurpose = User::with('purpose')->get()->toArray();
        // $user_with_purpose = array_filter($alluser_and_allpurpose, function($key){
        //     return $key['id'] == auth()->user()->id;
        // });

        // $alluser_and_allprocess = User::with('process')->get()->toArray();
        // $user_with_process = array_filter($alluser_and_allprocess, function($key){
        //     return $key['purpose_id'] == auth()->user()->id;
        // });

        // dd(auth()->user()->process);        
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
        //現在ログイン状態のユーザー情報を取得
        $my_user_info = auth()->user();

         //add process
        //at the line of insert a record to purpose table, must do it with user_id column inserted 


        $purpose_new_datas = $request->user()->purpose()->create([
            'title' => $request->purpose_title,
            'status' => $request->purpose_status, 
            'user_id'=> auth()->user()->id,
        ]);

        for ($i=0; $i < 10; $i++) { 
            $request->user()->process()->create([
                'purpose_id' => $purpose_new_datas['id'],
                'sort_number'  => $request->title[$i] == null ? "" : $i + 1,
                'title' => $request->title[$i] ?? "",
                'command' => $request->command[$i] ?? "",
                'description' => $request->description[$i] ?? "",
            ]);
        }

        //上と下のコードは同じことをしているが、user()を使えば上のようにシンプルに書ける
       
        // $purpose_new_datas = Purpose::create([
        //     'title' => $request->purpose_title,
        //     'status' => $request->purpose_status, 
        //     'user_id'=> auth()->user()->id,
        // ]);
        
        // for ($i=0; $i < 10; $i++) { 
        //     Process::create([
        //         'purpose_id' => $purpose_new_datas['id'],
        //         'sort_number'  => $request->title[$i] == null ? "" : $i + 1,
        //         'title' => $request->title[$i] ?? "",
        //         'command' => $request->command[$i] ?? "",
        //         'description' => $request->description[$i] ?? "",
        //     ]); 
        // }
        
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
