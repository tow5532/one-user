@if (count($breadcrumbs))

    <ul class="page-breadcrumb">
        @foreach ($breadcrumbs as $key=>$breadcrumb)
            <li>
                <a href="{{ $breadcrumb->url }}">
                    @if($key === 0)
                        <i class="fa fa-home"></i>
                    @endif
                    {{ $breadcrumb->title }}
                </a>
                @if($key < count($breadcrumbs) -1)
                    <i class="fa fa-angle-double-right"></i>
                @endif
            </li>
        @endforeach
    </ul>

@endif
