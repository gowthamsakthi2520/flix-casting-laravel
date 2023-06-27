<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;
class Subservices extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="subservices";
    protected $guarded=[];

    public function services(){
       return $this->hasOne(Services::class,'id','service_id');
    }


}
