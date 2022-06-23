<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purpose extends Model
{


    use HasFactory, SoftDeletes;
    protected $fillable =['title', 'status', 'user_id'];



    ///
    /// 関連しているモデルのクラス名をhasMany関数に渡すと、関連しているモデルデータをrelated keyに含んだ状態で返ってくる。
    ///
    public function process()
    {
        return $this->hasMany(Process::class);
    }


    //
    //Laravelは勝手に親の「id」と子の「user_id」というカラム名があれば探して紐づけてくれるから下記は必要ない
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }





    public function getMyStatus()
    {
        // dd($this);
        $target_purpose = $this->get();
        dd($target_purpose);
        return $target_purpose[0]->status;

    }



    public function getNewestUpdateAt()
    {
        // dd($this); // $this is purpose
        $processes = $this->process; //relations is key name of purpose value as processes which are related
        $newestDate = $this->updated_at;        
        
        $newestDateString = function($dateArray){
            return "{$dateArray->year} / {$dateArray->month} / {$dateArray->day}";
        };

        foreach ($processes as $value) {
            if ($newestDate->lessThan($value->updated_at)) {
                $newestDate = $value->updated_at;

            }
        }

        return $newestDateString($newestDate);
    }




}
