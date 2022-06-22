<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purpose;

class Process extends Model
{
    use HasFactory;
    protected $fillable = ['purpose_id', 'sort_number', 'title', 'command', 'description', 'user_id'];


    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function getId(){
        return $this->id;
    }



    // public function person()
    // {
    // return $this->belongsTo('App\Models\Person');
    // }
    // public function getData()
    // {
    // return $this->id.'： ' .$this->person->name.' 貸出日:'. $this->id;
    // }
}