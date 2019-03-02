@extends('layouts.partlist')


@section('outerclass')
    col-sm-7 bg-blur
@stop

@section('title_name')
    {{$notice_posts[0]->category->name}}
@endsection

@section('link')
    {{route('category', ['id' => 1])}}
@endsection

@section('list')
    @foreach($notice_posts as $new)

        <li class="">
            <span class="post-newday">{{date_format($new->created_at,"d")}}</span><span class="post-newmonth">{{date_format($new->created_at,"Y/m")}}</span>
            <span class="ftitle"><a href="post/{{$new->id}}" title="{{$new->title}}">
                <i class="glyphicon glyphicon-triangle-right"></i>
                <strong>{{App\Helper\StringHelper::substrtitle($new->title,30)}}
                    @if($new->created_at->diffInHours(\Carbon\Carbon::now()) < 72)
                        <span class="new_info">new</span>
                    @endif
                </strong>
            </a></span>
            <div class="clearfix">	</div>
            <span class="fbody"><p>{{App\Helper\StringHelper::substrtitle(str_replace("&nbsp;","",strip_tags($new->body)),45) }} </p></span>
        </li>
    @endforeach
@stop