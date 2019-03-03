<?php
/**
 * Created by PhpStorm.
 * User: ns
 * Date: 2019/3/3
 * Time: 15:42
 */


namespace App\Http\Composer;

use Illuminate\Contracts\View\View;
use TCG\Voyager\Models\Post;
class DonateComposer {
    public function compose(View $view)
    {
        $view->with('donate_posts', Post::where('category_id',1)->orderBy('created_at', 'DESC')->take(7)->get());
    }
}



?>