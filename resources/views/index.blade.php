@extends('layouts.main')

@section('css')
    {{Html::style('css/swiper/swiper.min.css')}}
@endsection

@section('title')
    {{env('APP_NAME', '浙江财经大学|校友网')}}
@endsection

@section('slider')
    @include('partials._slider')
@endsection

@section('body')
    <!-- new line -->
    @include('blocks._notice')
    @include('blocks._donate')
    {{--@include('blocks._sidebar')--}}
    {{--<div class="clear" style="height: 40px"></div>--}}
    {{--<!-- new line -->--}}
    {{--@include('blocks._jobs')--}}
    {{--@include('blocks._recommends')--}}
    {{--@include('blocks._recruits')--}}
    {{--<!-- new line -->--}}
    {{--<div class="clear" style="height: 40px"></div>--}}
    {{--@include('blocks._piclink')--}}
    {{--@include('blocks._search_contact')--}}
    {{--<div class="clear" style="height: 40px"></div>--}}
    {{--@include('blocks._friendlink')--}}
@endsection

@section('script')
    {{Html::script('js/swiper/swiper.min.js')}}
    {{Html::script('js/embed_index.js')}}
    {{Html::script('js/hoverdelay.js')}}
    <script type="text/javascript">
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            loop: true,

            pagination:{
                el:'.swiper-pagination',
            },

            navigation:{
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        $("#icon_01").hoverDelay({
            hoverDuring: 300,
            hoverEvent: function(){
                $("#icon_01 .qrcode").show(500);
            },
            outEvent: function(){
                $("#icon_01 .qrcode").hide(500);
            }
        });
        $("#icon_02").hoverDelay({
            hoverDuring: 300,
            hoverEvent: function(){
                $("#icon_02 .qrcode").show(500);
            },
            outEvent: function(){
                $("#icon_02 .qrcode").hide(500);
            }
        });

        var area = document.getElementById('moocBox');
        var iliHeight = 24;//单行滚动的高度
        var speed = 50;//滚动的速度
        var time;
        var delay= 2000;//设置延迟执行时间
        area.scrollTop=0;
        area.innerHTML+=area.innerHTML;//克隆一份一样的内容
        function startScroll(){
            time=setInterval("scrollUp()",speed);
            area.scrollTop++;
        }
        function scrollUp(){
            if(area.scrollTop % iliHeight==0){
                //如果当前滚动高度为单行高度的倍数
                clearInterval(time);
                setTimeout(startScroll,delay);//延迟执行2000毫秒
            }else{
                area.scrollTop++;
                if(area.scrollTop >= area.scrollHeight/2){
                    area.scrollTop =0;
                }
            }
        }
        setTimeout(startScroll,delay);



    </script>

@endsection