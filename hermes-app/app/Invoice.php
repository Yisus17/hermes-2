<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model{
	protected $fillable = [
		'delivery_date', 'return_date', 'instalation_date', 
		'start_date', 'end_date', 'uninstalation_date',
		'validity', 'description', 'address', 
		'payment_conditions', 'payment_method', 'tax_percentage', 'notes', 'deleted'];

	protected $dates = [
		'delivery_date', 'return_date', 
		'instalation_date', 'start_date', 'end_date', 'uninstalation_date'];

	public function client(){
		return $this->belongsTo(Client::class);
	}

	public function products(){
    return $this->belongsToMany(Product::class)->withPivot( 
			'id','description', 'quantity', 'factor', 'unit_price', 'discount', 'total_price');
	}

	public function getTotalWithTaxAttribute(){
		$taxAmount = getPercentageValue($this->total, $this->tax_percentage);
		return $this->total + $taxAmount;
	}
	
	public function getTaxAmountAttribute(){
		$taxAmount = getPercentageValue($this->total, $this->tax_percentage);
		return $taxAmount;
	}
}
