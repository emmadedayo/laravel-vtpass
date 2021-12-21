<?php
namespace Emmadedayo\VtPass;

use Illuminate\Support\Facades\Http;
use Emmadedayo\VtPass\VTPassConfigFile;

/**
 *
 */
trait Request
{
  public static function vt(){
    return new VTPassConfigFile;
  }

  public static function post($endpoint, $params)
  {
    return self::request($endpoint, $params, 'post');
  }

  public static function get($endpoint, $params)
  {
    return self::request($endpoint, $params);
  }

  private static function merge($ar, $arr){
    return array_merge($ar, $arr);
  }

  public static function request($endpoint, $params, $method = 'get')
  {
    $vt       = self::vt();
    $username = $vt->username;
    $password = $vt->password;
    $res = Http::withBasicAuth($username, $password)->$method(
      $vt->url.$endpoint, self::merge([], $params));
    /// $vt->url.$endpoint, self::merge([], array_merge($params,['request_id'=>time()])));
    if ($res->failed()) {
      $res->throw();
    } else {
      return $res;
    }
  }

}
