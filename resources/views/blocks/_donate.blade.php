<div class="col-sm-3  small_list">
    <div class="in_title">
        <strong class="in_titleName">{{$donate_posts[0]->category->name}}</strong>
        <span class="in_titleLine"></span>
        <a href="{{route('category', ['id' => 1])}}" class="in_titleMore">更多<i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
    <div class="in_newsList">
        <ul>
            @foreach($donate_posts as $new)
                <li>
                    <a href="post/{{$new->id}}" title="{{$new->title}}">
                        <i class="glyphicon glyphicon-triangle-right"></i>
                        <strong>{{App\Helper\StringHelper::substrtitle($new->title,10)}}
                            @if($new->created_at->diffInHours(\Carbon\Carbon::now()) < 72)
                                <span class="new_info">new</span>
                            @endif
                        </strong>
                        <span class="float-right">{{date_format($new->created_at,"m-d")}}</span>
                    </a>
                </li>
                <div class="clearfix">	</div>
            @endforeach
        </ul>
    </div>

</div>