<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Flash extends Model
{
    
    private $success = 'text-green-300 border-green-500 hover:bg-gray-300 hover:text-green-600 active:bg-gray-600';
    private $danger = 'text-red-300 border-red-500 hover:bg-gray-300 hover:text-red-600 active:bg-gray-600';

    function __construct($success,$danger) {
        $this->succes = $success;
        $this->danger = $danger;
    }
   

    public function scopeDanger(){
        
        return $this->danger;
    }

    public function scopeSuccess(){
        
        return $this->success;
    }
   
}

