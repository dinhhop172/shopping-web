<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @foreach ($categoryParent as $categoryItem)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if (!$categoryItem->categoryChild->isEmpty())
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ Str::lower($categoryItem->name) }}">
                            @if (!$categoryItem->categoryChild->isEmpty())
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                            {{ $categoryItem->name }}
                        </a>
                        @else
                        <a href="{{ route('front.category', ['slug' => $categoryItem->slug, 'id'=>$categoryItem->id]) }}">
                            {{ $categoryItem->name }}
                        </a>
                        @endif
                    </h4>
                </div>
                <div id="{{ Str::lower($categoryItem->name) }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($categoryItem->categoryChild as $categoryItemChild)
                            <li><a href="{{ route('front.category', ['slug' => $categoryItemChild->slug, 'id'=>$categoryItemChild->id]) }}">{{ $categoryItemChild->name }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--/category-products-->

    </div>
</div>
