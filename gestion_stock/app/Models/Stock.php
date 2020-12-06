<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
 
 
    use HasFactory;
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];


    
    public function demandes(){
        return $this->belongsTo('App\Models\Demande');
    }
}
