<?php
/**
 * Created by PhpStorm.
 * User: ns
 * Date: 2018/11/8
 * Time: 16:35
 */

namespace App\Helper;
use TCG\Voyager\Models\Post;

/**
 *
 */
class StringHelper
{

    static function substrtitle($str, $num){
        $newStr = $str;
        if(mb_strlen($str)>$num){
            $newStr = mb_substr($str,0,$num,"UTF8")."...";
        }


        return $newStr;
    }

    static function getPrevPostId($id)
    {
        return Post::where('id', '<', $id)->max('id');
    }

    static function getNextPostId($id)
    {
        return Post::where('id', '>', $id)->min('id');
    }
}

?>