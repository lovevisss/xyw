<div class="col-sm-3 no-padding slider">
    <ul>

        @foreach($menus as $menu)

            <li>
                <a href="{{$menu->link()}}" @if($menu->title == $title)
                class="active"
                        @endif>
                    <i class="icon-home"></i><span>{{$menu->title}}</span><b class="icon-drop_right"></b>
                </a>
            </li>

        @endforeach


    </ul>
    @include('partials._contact')

    @include('partials._iconLink')

</div>