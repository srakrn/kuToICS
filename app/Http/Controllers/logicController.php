<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class logicController extends Controller
{
  public function generateJSON($data)
  {
    $array = explode("\n", $data);
    $list = [];
    foreach ($array as $line)
    {
      if(substr($line,0,11) === " layOutDay(")
      {
        $code = substr($line, 11, -1);
        $date = substr($code, 1, 10);
        $date = str_replace('scheduler','',$date);

        $JSONtxt = substr($code, 13,-2);

        $JSONtxt = str_replace("'",'"',$JSONtxt);
        $JSONtxt = trim($JSONtxt);
        $JSONtxt = str_replace(mb_convert_encoding('&#x0009;', 'UTF-8', 'HTML-ENTITIES'),' ',$JSONtxt);
        $JSONtxt = str_replace('title','"title"',$JSONtxt);
        $JSONtxt = str_replace('<U>','',$JSONtxt);
        $JSONtxt = str_replace('</U>','',$JSONtxt);
        $JSONtxt = str_replace('<b>','',$JSONtxt);
        $JSONtxt = str_replace('</b>','',$JSONtxt);
        $JSONtxt = str_replace('<br>',' ',$JSONtxt);
        $JSONtxt = str_replace('</br>','',$JSONtxt);

        $JSONtxt = str_replace('locations','"locations"',$JSONtxt);
        $JSONtxt = str_replace('start','"start"',$JSONtxt);
        $JSONtxt = str_replace('end','"end"',$JSONtxt);
        $JSONtxt = str_replace('color','"color"',$JSONtxt);

        $JSON = json_decode($JSONtxt);

        $list[$date] = $JSON;
      }
    }
    return $list;
  }

  public function toReadableJSON($json)
  {
    $subjectList = [];
    $dateNum = "";

    while ($date = current($json))
    {
        $dateNum = key($json);
        foreach($date as $subject)
        {
          $subject->date = $dateNum;
          $dateCode = "";
          switch($subject->date){
            case "1":
              $dateCode = "SU";
              break;
            case "2":
              $dateCode = "MO";
              break;
            case "3":
              $dateCode = "TU";
              break;
            case "4":
              $dateCode = "WE";
              break;
            case "5":
              $dateCode = "TH";
              break;
            case "6":
              $dateCode = "FR";
              break;
            case "7":
              $dateCode = "SA";
              break;
          }

          switch($subject->date){
            case "2":
              $beginningDate = "20170731";
              break;
            case "3":
              $beginningDate = "20170801";
              break;
            case "4":
              $beginningDate = "20170802";
              break;
            case "5":
              $beginningDate = "20170803";
              break;
            case "6":
              $beginningDate = "20170804";
              break;
            case "7":
              $beginningDate = "20170805";
              break;
            case "1":
              $beginningDate = "20170730";
              break;
          }

          $subject->dateCode = $dateCode;
          $subject->beginningDate = $beginningDate;
          $subject->locations = trim($subject->locations);
          $init = $subject->start;
          $term = $subject->end;

          $inith = (floor((intval($init)+420)/60))*10000;
          $initm = (intval($init)%60)*100;

          $termh = (floor((intval($term)+420)/60))*10000;
          $termm = (intval($term))%60*100;

          $subject->start = sprintf('%06d', $inith + $initm);
          $subject->end = sprintf('%06d', $termh + $termm);
          $subject->UID = sprintf("%10d",mt_rand(1000000000,9999999999))."@srakrn.me";
          $timeInitPos = strpos($subject->locations,"เวลา");
          $subject->locations = substr($subject->locations,0,($timeInitPos));
          unset($subject->color);
          array_push($subjectList, $subject);
        }
        next($json);
    }
    return $subjectList;
  }

  public function removeSubjectCode($array)
  {
    foreach($array as $subject)
    {
      $subject->title = substr($subject->title,9,(strlen($subject->title)-9));
    }
    return $array;
  }
}
