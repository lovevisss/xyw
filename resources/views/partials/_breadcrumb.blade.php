<div class="breadcrumb">
    @if($parent_menu)
        <p>当前位置： <a href="{{$parent_menu->link()}}">{{$parent_menu->title}}</a> > {{$title}}</p>
    @else
        <p>当前位置： {{$title}}</p>
    @endif
</div>