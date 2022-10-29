<?php

if (!function_exists('FullThaiDate')) {
    function FullThaiDate($sqlDateTime)
    {
        $month = array(
            "01" => "มกราคม",
            "02" => "กุมภาพันธ์",
            "03" => "มีนาคม",
            "04" => "เมษายน",
            "05" => "พฤษภาคม",
            "06" => "มิถุนายน",
            "07" => "กรกฎาคม",
            "08" => "สิงหาคม",
            "09" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม",
        );
        if (!empty($sqlDateTime)) {
            $timestamp = strtotime($sqlDateTime);
            $thaiDate = date("j", $timestamp);
            $thaiDate .= " " . $month[date("m", $timestamp)];
            $thaiDate .= " " . date("Y", $timestamp) + 543;
            $thaiDate .= " " . date("H:i:s", $timestamp);
            return $thaiDate;
        } else {
            return null;
        }
    }
}
