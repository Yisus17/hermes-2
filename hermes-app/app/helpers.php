<?php

function getPercentageValue($value, $percentage){
  return ($value * $percentage)/100;
}

function calculateProductTotalPrice($product){
  $product['discount'] = $product['discount'] ? $product['discount'] : 0;
  $discount = getPercentageValue($product['unit_price'], $product['discount']);
  $totalProductPrice = (($product['unit_price'] - $discount) * $product['quantity']) * $product['factor'];
  return $totalProductPrice;
}

function getPaymentConditions(){
  $paymentConditions = [
    'cash' => 'Contado',
    'advanced' => 'Adelantado',
    '15d' => 'A 15 días',
    'reservation_percentage' => 'Porcentaje de reserva mas saldo pendiente a fecha'
  ];
  return $paymentConditions;
}

function getPaymentMethods(){
  $paymentMethods = [
    'transfer' => 'Transferencia',
    'cash' => 'Efectivo'
  ];
  return $paymentMethods;
}

function getValidityOptions(){
  $validityOptions = [
    '1d' => '1 día',
    '1s' => '1 semana',
    '15d' => '15 días',
    '1m' => '1 mes'
  ];
  return $validityOptions;
}

function findValue($array, $key){
  return $array[$key];
}

function getFormattedPrice($price){
  return number_format($price, 2, ',', '.');
}

function truncateText($text, $numberOfChars){
  return \Illuminate\Support\Str::limit($text, $numberOfChars, $end='...');
}

function getOnyxBusinessName(){
  return("Onyx's Gerencia de Proyectos Audiovisuales SL");
}

function getOnyxAddress(){
  return("Calle Belianes 1, 1-4. 28043. Madrid - España");
}

function getOnyxInfo(){
  return("675 27 19 67 | adolfo@onyxs.es | B88095534");
}

function getGlobalTaxPercentage(){
  return(21);
}

function getPagePaginatorsSize(){
  return(30);
}

//Devuelve un numero en formato de 4 digitos
function numerationReportFormat($idInt)
{
  $stringId = strval( $idInt);
  return str_pad($stringId, 4, '0', STR_PAD_LEFT);	
}

function getInvoiceMainTextLine1(){
  return "PAGOS A SER REALIZADOS A LA SIGUIENTE CUENTA";
}

function getInvoiceMainTextLine2(){
  return "BANKIA | IBAN: ES93 2038 1958 4760 0017 7141 | SWITF: CAHMESMMXXX";
}

function getInvoiceMainTextLine3(){
  return "ONYX'S GERENCIA DE PROYECTOS AUDIOVISUALES SL";
}

function getBudgetMainTextLine1(){
  return "Se considerará aceptado una vez que sea devuelto firmado y/o sellado por el cliente";
}

function getBudgetMainTextLine2(){
  return "El precio incluye únicamente los artículos y fechas indicados en el presente documento";
}

function getBudgetMainTextLine3(){
  return "La jornada de los técnicos no deberá exceder las 10 horas";
}


function getCurrencies(){
  return [
    'USD' => 'USD',
    'EUR' => 'EUR',
    'COP' => 'COP',
    'BRL' => 'BRL'
  ];
}

function getProductTypesOptions(){
  return  [
    '1' => 'Regular',
    '2' => 'Servicio'
  ];
}


?>