@if ($categoryParent->categoryChild->count())
<ul role="menu" class="sub-menu">
    @foreach ($categoryParent->categoryChild as $cateChildItem)
    <li>
        <a href="shop.html">{{ $cateChildItem->name }}</a>
        @if ($cateChildItem->categoryChild->count())
        @include('frontend.components.child_menu', ['categoryParent'=>$cateChildItem])
        @endif
    </li>

    @endforeach
</ul>
@endif
