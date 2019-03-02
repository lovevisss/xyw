slder
<div class="swiper-container col-sm-12">
    <div class="swiper-wrapper">
        @foreach($image_posts as $post)
            <div class="swiper-slide"><a href="post/{{$post->id}}"><img src="storage/{{$post->image}}" class="slider_image"><span>{{$post->title}}</span></a></div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<div class="clear">

</div>