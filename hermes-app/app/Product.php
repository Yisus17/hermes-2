<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
	protected $unitPricePercentage = 5;

	protected $fillable = [
		'code', 'brand', 'model', 'description', 
		'type', 'serial', 'purchase_price', 'status', 
		'bought_by', 'countable', 'purchase_date', 'years_old', 'deleted'];

	protected $casts = [
		'countable' => 'boolean'
	];

	protected $dates = ['purchase_date'];

	public function category(){
		return $this->belongsTo(Category::class);
	}

	public function budgets(){
    return $this->belongsToMany(Budget::class);
	}
	
	public function invoices(){
    return $this->belongsToMany(Invoice::class);
  }

	public function getUnitPriceAttribute(){
		return getPercentageValue($this->purchase_price, $this->unitPricePercentage);
	}
}
