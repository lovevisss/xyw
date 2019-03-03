
@extends('layouts.content')

@section('breadcrumb')

    @include('partials._breadcrumb')

@endsection

@section('content')
    <div class="article">
        <h2>{{$data->title}}</h2>
        <h5>发布时间:{{date_format($data->created_at,"Y/m/d")}} | 作者:{{$data->author}}</h5>
        <hr>
        {!!$data->body!!}

        @if($data->attach)
            @foreach(json_decode($data->attach,true) as $test)
                <a href="{{ Voyager::image($test['download_link']) }}" class="glyphicon glyphicon-paperclip"> {{$test['original_name']}}</a><br>
            @endforeach
        @endif
    </div>


@endsection

@section('paginate')
    @if($type == 'post')
        <div style="margin-top: 1em">
            <div class="col-md-4" style="text-align: center">
                <a href="{{route('post', App\Helper\StringHelper::getPrevPostId($data->id))}}" class="btn btn-primary">上一篇</a>

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4" style="text-align: center">
                <a href="{{route('post', App\Helper\StringHelper::getNextPostId($data->id))}}" class="btn btn-primary">下一篇</a>

            </div>
        </div>
    @endif
@endsection