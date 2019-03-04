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
    <div class="col-sm-12">

        <img src="{{asset('images/xiaoqing.jpg')}}" alt="" class="pic-center">
    </div>
    @include('blocks._info')
    @include('blocks._recent')
    {{--@include('blocks._sidebar')--}}
    {{--<div class="clear" style="height: 40px"></div>--}}
    {{--<!-- new line -->--}}
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

        $(function () {
            $('ul.spy').simpleSpy();
        });
        (function ($) {
            $.fn.simpleSpy = function (limit, interval) {
                limit = limit || 12;//展示数量
                interval = interval || 4000;
                return this.each(function () {
                    var $list = $(this),//将当前对象传给$list
                        items = [],
                        currentItem = 0,
                        total = 0,
                        height = $list.find('> li:first').height();//20

                    $list.find('> li').each(function () {
                        items.push('<li>' + $(this).html() + '</li>');
                        //将所有的元素导进去，放到数组items
                    });
                    total = items.length;//获取所有li元素长度
                    $list.wrap('<div class="spyWrapper" />').parent().css({ height : height * limit });
                    //用<div class="spyWrapper" />包裹元素，并设置高度
                    $list.find('> li').filter(':gt('+(limit-1)+')').remove();//移除最后一个元素
                    function spy() {
                        var $insert = $(items[currentItem]).css({
                            //设置列表第一个元素高度0，透明度为0，并消失
                            height : 0,
                            opacity : 0,
                            display : 'block'
                        }).appendTo($list);//appendTo() 方法在被选元素的后面（仍位于内部）插入指定内容。
                        $list.find('> li:first').animate({ opacity : 0,height : 0}, 1000, function () {
                            $(this).remove();
                            $insert.animate({ height : height }, 1000).animate({ opacity : 1 }, 1000);
                        });
                        currentItem++;
                        if (currentItem >= total) {
                            currentItem = 0;
                        }
                        setTimeout(spy, interval);
                    }
                    spy();
                });
            };

        })(jQuery);

    </script>

@endsection