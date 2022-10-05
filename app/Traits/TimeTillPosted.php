<?php

namespace App\Traits;

trait TimeTillPosted
{
    public function getTimeTillCreation($article) : string
    {
        $date_interval = date_diff($article['created_at'], date_create(date("Y-m-d H:i:s")));
        $date_diffrence = array(
            'year' => $date_interval->y,
            'month' => $date_interval->m,
            'day' => $date_interval->d,
            'hour' => $date_interval->h,
            'minute' => $date_interval->i,
            'second' => $date_interval->s
        );

        foreach($date_diffrence as $key => $diff) {
            if($diff != 0){
                $key = $diff > 1 ? $key . "s" : $key;
                return $diff . " " . $key;
            }
        }
        return '0 seconds';
    }
}
