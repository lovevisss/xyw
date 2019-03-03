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
            <img src="{{$new->image}}" alt="">
            <span class="fbody"><p>{{App\Helper\StringHelper::substrtitle(str_replace("&nbsp;","",strip_tags($new->body)),45) }} </p></span>
        </li>
    @endforeach
@stop