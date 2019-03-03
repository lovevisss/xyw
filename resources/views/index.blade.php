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
        function scroll(lh,speed,delay,id){
            var box = document.getElementById(id);
            var _l = box.getElementsByTagName('li').length;
            var height = lh * _l;
            var t = null;
            var _t = null;
            var num = 0;
            var flag = 0;
            var _topflag = 0;
            if(height <= lh){
                return false;
            }else{
                auto();
            }
            function topdelay(){
                var _t1 = setTimeout(function(){
                    _topflag = 1;
                },delay);
            }

            function delay_time(){
                if(num < delay){
                    _t = setInterval(function(){
                        num++;
                        if(num == delay/1000){
                            window.clearInterval(_t);
                            flag = 0;
                            if(box.scrollTop >= height-lh){
                                topdelay();
                                if(_topflag){
                                    box.scrollTop = 0;
                                    _topflag = 0;
                                }

                            }
                            auto();
                        }
                    },1000);
                }
            }
            function auto(){
                if(flag == 0){
                    var i = 0;
                    var s = setInterval(function(){
                        i++;
                        if(i == delay/1000){
                            t = setInterval(function(){
                                box.scrollTop += 2;
                                if(box.scrollTop % lh == 0){
                                    window.clearInterval(t);
                                    flag = 1;
                                    num = 0;
                                    delay_time();
                                }
                            },speed);
                        }
                    },1000);
                }
            }
        }
        scroll(34,50,1000,'count');



    </script>

@endsection