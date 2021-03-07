<div class="container my-6">
    <div class="row">
        <div class="col-sm-9">
            @if ($posts->count() > 0)
            @foreach ($posts as $post)
            <article class="post post__horizontal mb-5 clearfix">
                <div class="row">
                    <figure class="post__thumbnail col-sm-5 mb-3">
                        <a href="{{ $post->url }}" class="post__overlay">
                            <img src="{{ RvMedia::getImageUrl($post->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                alt="{{ $post->name }}">
                        </a>
                    </figure>
                    <div class="post__content-wrap col-sm-7">
                        <header class="post__header">
                            <h3 class="post__title">
                                <a href="{{ $post->url }}">{{ $post->name }}</a>
                            </h3>
                            <div class="post__meta">
                                <span class="post__created-at">
                                    <svg class="inline-flex" width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $post->created_at->format('M d, Y') }}</span>
                                <span>
                                    <svg class="inline-flex" width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{ $post->views }} {{ __('Views') }}</span>
                                <span><svg class="inline-flex" width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{$post->author->first_name .' '. $post->author->last_name}}</span></div>
                        </header>
                        <div class="post__content">
                            <p>{{ \Illuminate\Support\Str::limit($post->description, 184) }}</p>
                        </div>
                        <div class="post__footer">
                            <a href="{{ $post->url }}" class="post__readmore">{{ __('Read More') }} <svg width="24" height="24"
                                    class="inline-flex ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <div class="pagination_style1 justify-content-center">
                {!! $posts->appends(request()->query())->links() !!}
            </div>
            @endif
        </div>
        <div class="col-sm-3">
            <div class="page-sidebar">
                {!! Theme::partial('sidebar') !!}
            </div>
        </div>
    </div>

</div>
