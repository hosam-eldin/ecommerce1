<?php

namespace App\Traits;

trait HasGravatar
{
  public function getGravatar($size = 200)
  {
    $hash = md5(strtolower(trim($this->email)));
    return "https://www.gravatar.com/avatar/$hash?s={$size}&d=mp";
  }
}