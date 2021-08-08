<?php

namespace App;

use Illuminate\Support\Facades\File;

class Helper
{
    public static function getJson($json, $isToArray = false) {
        return json_decode(
            file_get_contents(public_path('js/json/') . $json),
            $isToArray
        );
    }
    
    public static function isDirEmpty($directory) {
        if (!is_readable($directory)) return null;
        return (count(scandir($directory)) == 2);
    }

    public static function deleteAllFile($directory)
    {
        if (!self::isDirEmpty($directory)) {
            $subclassImages = scandir($directory);

            if (!self::isDirEmpty($directory)) {
                foreach ($subclassImages as $image) {
                    File::delete($image);
                }
            }
        }
    }

}