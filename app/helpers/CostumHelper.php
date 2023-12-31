<?php

namespace App\helpers;

use Illuminate\Support\Str;

class CustomHelper {

  public static function generateSlug($str, $model){

    $slug = Str::slug($str, '-');
    $original_slug = $slug;
    $slug_exist = $model::where('slug', $slug)->first();
    $c = 1;
    while($slug_exist){
      $slug = $original_slug . '-' . $c;
      $slug_exist = $model::where('slug', $slug)->first();
      $c ++;
    }
    return $slug;
  }
}

?>
