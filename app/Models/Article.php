<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'Admin_id' , 'title' , 'secoundDescription' , 'secoundImage' , 'firstDescription' , 'firstImage'
    ];

    public function admin(){
        return $this -> belongsTo(Admin::class);
    }
}
