<?php
/**
 * Created by PhpStorm.
 * User: ns
 * Date: 2019/3/2
 * Time: 15:31
 */

namespace App\Http\Composer;

use Illuminate\Contracts\View\View;
use TCG\Voyager\Models\Post;
class SliderComposer {
    public function compose(View $view)
    {
        $view->with('image_posts', Post::where('image' , '!=', null)->orderBy('created_at', 'DESC')->take(3)->get());
    }
}



?>