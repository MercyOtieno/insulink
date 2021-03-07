<section id="dsc__pageheader">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!! Theme::breadcrumb()->render() !!}
                <h2 class="capitalize text-xl sm:text-2xl font-semibold text-black text-white">{{ $page->name }}</h2>
            </div>
        </div>

    </div>
</section>
{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
