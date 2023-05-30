<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = ['image', 'name', 'description', 'owner', 'contributors', 'languages','type_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
    public function leads(){
        return $this->belongsToMany(Lead::class);
    }
   
}