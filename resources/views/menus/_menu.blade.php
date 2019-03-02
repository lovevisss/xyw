<ul class="clearfix">

    @foreach($items as $key => $menu_item)
        <li class="@if($menu_item->title == $options->parent_menu->title)  //option 是从menu中传入的参数
                        current
            @endif"><a class="navName" href={{$menu_item->link()}} >{{ $menu_item->title }}</a>
            @if($menu_item->children)
                <ul>
                    @foreach($menu_item->children as $child)
                        <li><a href={{$child->link()}}>{{$child->title}}</a>	</li>
                    @endforeach
                </ul>

            @endif
        </li>
    @endforeach
        <li>
                {{ Form::open(['url' => 'search'])}}
                <div class="input-group ">
                        <input title="请输入您想搜索的关键词。" data-drupal-selector="edit-keys" class="form-search form-control" placeholder="Search" type="search" id="edit-keys" name="keys" value="" size="15" maxlength="128" data-toggle="tooltip" />
                        <span class="input-group-btn">
                        <button type="submit" value="Search" class="button js-form-submit form-submit btn-red btn icon-only" name="">
                            <span class="sr-only">Search</span>
                            <span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
                {{ Form::close()}}
        </li>
</ul>