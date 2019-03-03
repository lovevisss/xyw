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

                <img src="storage/{{$new->image}}" alt="" class="col-sm-6">

                <span class="fbody col-sm-6">
                    <p style="font-weight: bold; color:black;">{{$new->title}}</p>
                    <hr>
                    <p style="color:grey; text-indent: 1em">时间:[{{date_format($new->created_at,"Y-m-d")}}] &nbsp;&nbsp;&nbsp;作者:{{$new->author ? $new->author->name : 'admin'}}</p>
                    <p style="text-indent: 2em;">{{App\Helper\StringHelper::substrtitle(str_replace("&nbsp;","",strip_tags($new->body)),45) }} </p>
                </span>

            </li>
    @endforeach
@stop