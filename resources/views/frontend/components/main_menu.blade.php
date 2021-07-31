<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse" id="checkActive">
        <li><a href="{{ route('front.index') }}" class="active">Home</a></li>
        @foreach ($categoryLimit as $catgoryItem)
        <li class="dropdown">
            <a href="#">{{ $catgoryItem->name }}
                @if ($catgoryItem->categoryChild->count())
                <i class="fa fa-angle-down"></i>
                @endif
            </a>
            @include('frontend.components.child_menu', ['categoryParent'=>$catgoryItem])
        </li>
        @endforeach
        <li><a href="{{ route('front.contact') }}">Contact</a></li>
    </ul>
</div>
