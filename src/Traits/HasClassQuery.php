<?php

 namespace Emmadedayo\VtPass\Traits;

 use Illuminate\Support\Facades\Http;
 use Emmadedayo\VtPass\VTPass;

 trait HasClassQuery
 {
     public static function status($params)
     {
         return self::post("requery", $params)->json();
     }

     public static function purchaseAirTime(String $requestID, String $serviceID, int $amount, string $phone)
     {
         $params = array('request_id'=>$requestID, 'serviceID'=>$serviceID, 'amount'=>$amount, 'phone'=>$phone);
         return self::post("pay", $params)->json();
     }


     public static function purchaseData(String $requestID, String $serviceID, String $billerCode, String $variationCode, Int $amount, string $phone)
     {
         $params = array('request_id'=>$requestID, 'serviceID'=>$serviceID, 'billersCode'=>$billerCode, 'variation_code'=>$variationCode,  'amount'=>$amount, 'phone'=>$phone);
         return self::post("pay", $params)->json();
     }


     public static function purchaseTv(String $requestID, String $serviceID, String $billerCode, String $variationCode, Int $amount, string $phone, String $subscriptionType, String $quantity)
     {
         $params = array('request_id'=>$requestID, 'serviceID'=>$serviceID, 'billersCode'=>$billerCode, 'variation_code'=>$variationCode, 'amount'=>$amount, 'phone'=>$phone, 'subscription_type'=>$subscriptionType, 'quantity'=>$quantity);
         return self::post("pay", $params)->json();
     }


     public static function purchaseTvRenewal(String $requestID, String $serviceID, String $billerCode, Int $amount, string $phone, String $subscriptionType)
     {
         $params = array('request_id'=>$requestID, 'serviceID'=>$serviceID, 'billersCode'=>$billerCode, 'amount'=>$amount, 'phone'=>$phone, 'subscription_type'=>$subscriptionType);
         return self::post("pay", $params)->json();
     }


     public static function purchaseElectricity(String $requestID, String $serviceID, String $billerCode, String $variationCode, Int $amount, string $phone)
     {
         $params = array('request_id'=>$requestID, 'serviceID'=>$serviceID, 'billersCode'=>$billerCode, 'variation_code'=>$variationCode, 'amount'=>$amount, 'phone'=>$phone);
         return self::post("pay", $params)->json();
     }


     public static function verify($params)
     {
         return self::post("merchant-verify", $params)->json();
     }

     public static function variations($params)
     {
         return self::get("service-variations", $params)->json();
     }

     public static function category($params = []){
         return self::get("service-categories", $params)->json();
     }

     public static function getServiceID($params){
         return self::get("services", $params)->json();
     }

     public static function getProductOptions($params){
         return self::get("options", $params)->json();
     }
 }
