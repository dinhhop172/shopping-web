@if ($categoryParent->categoryChild->count())
<ul role="menu" class="sub-menu">
    @foreach ($categoryParent->categoryChild as $cateChildItem)
    <li>
        <a href="{{ route('front.category', ['slug' => $cateChildItem->slug, 'id'=>$cateChildItem->id]) }}">{{ $cateChildItem->name }}</a>
        @if ($cateChildItem->categoryChild->count())
        @include('frontend.components.child_menu', ['categoryParent'=>$cateChildItem])
        @endif
    </li>

    @endforeach
</ul>
@endif
