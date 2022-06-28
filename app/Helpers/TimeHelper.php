<?php

namespace App\Helpers;

class TimeHelper
{
    public static function difference($minut){
        if($minut<60){
            return $minut ." minut";
        }else{
            $hour = (int)$minut/60;
            return $hour." soat"." ".($minut-$hour*60)." minut";
        }
    }
}
