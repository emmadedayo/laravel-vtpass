<?php
namespace Emmadedayo\VtPass\Traits;

use Illuminate\Support\Facades\Http;
use Emmadedayo\VtPass\VTPass;

/**
 *
 */
trait HasQuery
{
  public static function status($params)
  {
    return self::post("requery", $params)->json();
  }

  public static function purchase($params)
  {
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
