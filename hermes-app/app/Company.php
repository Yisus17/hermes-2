<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
        'currency',
        'sector_id'
    ]; 


    public function sector(){
		return $this->belongsTo(Sector::class);
	}

}
