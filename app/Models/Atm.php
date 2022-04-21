<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    use HasFactory;
    protected $table ='atm';
    protected $primarykey ='id';
    protected $fillable =['name','terminal'];
    //atm has many incident
    public function incidents(){
        return $this->hasMany(Incident::class);
    }
}
