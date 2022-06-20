<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Process;

class Purpose extends Model
{
    use HasFactory;
    protected $fillable =['title', 'status'];



    public function process()
    {
        return $this->hasMany(Process::class);
    }



    // public function test()
    // {
    //     $processCount = count($this->relations['process']);
    //     return $processCount;
    // }



    public function getNewestUpdateAt()
    {
        // dd($this); // $this is purpose
        $processes = $this->relations['process']; //relations is key name of purpose value as processes which are related
        $newestDate = $this['updated_at'];

        foreach ($processes as $key => $value) {
            if ($newestDate->lessThan($value['updated_at'])) {
                $newestDate = $value['updated_at'];
            }
        }

        return $newestDate;
    }


}
