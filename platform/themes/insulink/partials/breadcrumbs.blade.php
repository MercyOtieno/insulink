<ol class="breadcrumb">
    @foreach (Theme::breadcrumb()->getCrumbs() as $i => $crumb)
    @if ($i != (count(Theme::breadcrumb()->getCrumbs()) - 1))
    <li><a href="{{ $crumb['url'] }}">{!! $crumb['label'] !!}</a><span class="divider">/</span></li>
    @else
    <li class="active">{!! $crumb['label'] !!}</li>
    @endif
    @endforeach
</ol>