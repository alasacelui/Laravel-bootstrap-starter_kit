<?php 

use Carbon\Carbon;


if(!function_exists('calculateTimeRendered'))
{
    /**
     * calculate Time Rendered
     */
    function calculateTimeRendered($times): float
    {

        $collection = collect($times);

        $totals = $collection->reduce(function ($carry, $item) {
                return $carry + $item;
            });

            return convertSecondsToMinutes($totals);
    }
}

if(!function_exists('calculateTimeLoss'))
{
     /**
     * calculate Time Loss
     */
    function calculateTimeLoss($times): float
    {

        $collection = collect($times);

        $totals = $collection->reduce(function ($carry, $item) {
                return $carry + $item;
            });

            return convertSecondsToHours($totals);
    }
}


if(!function_exists('convertSecondsToHours'))
{
     /**
     * convert seconds - hour
     */
    function convertSecondsToHours($seconds)
    {
        return floor(($seconds%86400)/3600);
    }
}

if(!function_exists('convertSecondsToMinutes'))
{
     /**
     * convert second to minute
     */
    function convertSecondsToMinutes($seconds){
        return  floor(($seconds%3600)/60);
    }
}


if(!function_exists('differenceInHours'))
{
     /**
     * calculate the difference of two dateTime in hour format
     */
    function differenceInHours($startdate,$enddate){

        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%h hrs -  %i')." Minutes";
    
            return $totalDuration;
        }

        return '';
    }

}


if(!function_exists('differenceInSeconds'))
{
     /**
     * calculate the difference of two dateTime in seconds format
     */
    function differenceInSeconds($startdate,$enddate){

        $startTime = Carbon::parse($startdate);
        $endTime = Carbon::parse($enddate);

        return  $startTime->diffInSeconds($endTime);
    }
}


if(!function_exists('formatTime'))
{
    /**
     * format Time
     */
    function formatTime($time, $opt = "12")
    {
        if(!$time) {
            return '';
        }

        if($opt == "12") {
            return date('h:iA', strtotime($time));
        }
    }

}

if(!function_exists('formatDate'))
{
    /**
     * format date
     */
    function formatDate($date, $opt="fulldate")
    {
       if($opt == "fulldate") 
       {
          return  date('F d,Y', strtotime($date));
       }

       if($opt == "dateTimeWithSeconds") {
          return date('Y-m-d h:i:s', strtotime($date));
       }
       
       if($opt == "dateTimeLocal") {
        return date('Y-m-d\TH:i', strtotime($date));
       }
       if($opt == "dateTime") 
       {
          return  date('M d,Y h:iA', strtotime($date));
       }


       if($opt == "time") {
        return date('H:iA', strtotime($date));
       }
    }

}

if(!function_exists('getDateDiff'))
{
    /**
     * get the difference of two dateTime
     */
    function getDateDiff($startdate,$enddate){


        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%d');
    
            return $totalDuration;
        }

        return '';
     
    }
}


if(!function_exists('handleNullAvatar'))
{
    /**
     * handle Null Avatar Image
     */
    function handleNullAvatar($img)
    {
        return $img ?? '/img/noimg.svg';
    }
}


if(!function_exists('handleNullImage'))
{
    /**
     * handle Null Image
     */
    function handleNullImage($img)
    {
        return $img ?? '/img/noimg.png';
    }
}


if(!function_exists('isLikedByAuthUser'))
{
     /**
     * check if this model is liked by authenticated user
     */
    function isLikedByAuthUser($auth_user, $likers) 
    {
        $post_likers = [];// users who likes the post

        foreach($likers as $liker) {
        $post_likers[] = $liker->user_id; // get user id 
        }

        return  (in_array($auth_user, $post_likers)) ? true : false; // check if the user has already liked the post
    }
}


if(!function_exists('isApproved'))
{
     /**
     * check if the status is approved
     */
    function isApproved($bool)
    {
        if ($bool == 0) {
            return "<span class='badge bg-info p-2'>Pending <i class='fas fa-spinner ms-2'></i></span>";
        } else if($bool == 1) {
            return "<span class='badge bg-success p-2'>Approved</span>";
        } else {
            return "<span class='badge bg-danger p-2'>Declined</span>";
        }
    }

}


if(!function_exists('getDifferenceInHours'))
{
    /**
     * get the difference in two different dateTime
     */
    function getDifferenceInHours($startdate,$enddate){


        if($startdate && $enddate) {

            $startTime = Carbon::parse($startdate);
            $endTime = Carbon::parse($enddate);
    
            $totalDuration =  $startTime->diff($endTime)->format('%h');
    
            return $totalDuration;
        }

        return '';
     
    }

}




