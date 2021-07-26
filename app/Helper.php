<?php

namespace App;

class Helper
{
    public static function getJson($json, $isToArray = false) {
        return json_decode(
            file_get_contents(public_path('js/json/') . $json),
            $isToArray
        );
    }
}