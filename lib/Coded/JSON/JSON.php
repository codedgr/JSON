<?php

namespace Coded\JSON;

class JSON{

    /**
     * @param $value
     * @param int $options
     * @param int $depth
     * @return string
     * @throws JSONException
     */
    static function encode($value, $options = 0, $depth = 512){
        $result = json_encode($value, $options, $depth);
        static::error();
        return $result;
    }

    /**
     * @param $string
     * @param bool $assoc
     * @param int $depth
     * @param int $options
     * @return mixed
     * @throws JSONException
     */
    static function decode($string, $assoc = false, $depth = 512, $options = 0){
        $result = json_decode($string, $assoc, $depth, $options);
        static::error();
        return $result;
    }

    /**
     * @return bool
     * @throws JSONException
     */
    static function error(){
        switch (json_last_error()) {
            case JSON_ERROR_NONE:

            break;
            case JSON_ERROR_DEPTH:
                throw new JSONException('Maximum stack depth exceeded');
            break;
            case JSON_ERROR_STATE_MISMATCH:
                throw new JSONException('Underflow or the modes mismatch');
            break;
            case JSON_ERROR_CTRL_CHAR:
                throw new JSONException('Unexpected control character found');
            break;
            case JSON_ERROR_SYNTAX:
                throw new JSONException('Syntax error, malformed JSON');
            break;
            case JSON_ERROR_UTF8:
                throw new JSONException('Malformed UTF-8 characters, possibly incorrectly encoded');
            break;
            default:
                throw new JSONException('Unknown error');
            break;
        }
        return false;
    }

    /**
     * @param $folder
     * @param $file
     * @return mixed
     * @throws JSONException
     */
    static function load($folder, $file){
        $path = $folder.'/'.$file.'.json';
        if(!file_exists($path)) throw new JSONException('File "'.$path.'" does not exists.');

        return static::decode(file_get_contents($path));
    }
}