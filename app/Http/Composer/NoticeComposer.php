<?php
/**
 * Created by PhpStorm.
 * User: ns
 * Date: 2019/3/2
 * Time: 16:39
 */

namespace App\Http\Composer;

use Illuminate\Contracts\View\View;
use TCG\Voyager\Models\Post;
class NoticeComposer {
    public function compose(View $view)
    {
        $view->with('notice_posts', Post::where('category_id',1)->orderBy('created_at', 'DESC')->take(2)->get());
    }
}



?>