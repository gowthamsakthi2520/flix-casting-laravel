<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subservices;
use App\Models\Gallery;
use App\Models\Videos;
class Services extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="services";
    protected $guarded=[];

    public function subservices(){
        return $this->hasMany(Subservices::class,'service_id','id');
    }

    public function gallery(){
        return $this->hasMany(Gallery::class,'service_id','id');
    }

    public function videos(){
        return $this->hasMany(Videos::class,'service_id','id');
    }
}
