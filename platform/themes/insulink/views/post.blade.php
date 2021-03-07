@php Theme::set('pageName', __('Blog')) @endphp
<section id="dsc__pageheader">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!! Theme::breadcrumb()->render() !!}
                <h2 class="capitalize text-xl sm:text-2xl font-semibold text-black text-white">{{ $post->name }}</h2>
            </div>
        </div>

    </div>
</section>
<div class="section pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <article class="post post--single">
                    <header class="post__header">
                        <h3 class="post__title">{{ $post->name }}</h3>
                        <div class="post__meta">
                            <span class="post-created">
                                <svg width="15" height="15" class="inline-flex mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg> {{ $post->created_at->format('M d, Y') }}</span>
                            <span>
                                <svg width="15" height="15" class="inline-flex mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                @if (!$post->categories->isEmpty())
                                @foreach($post->categories as $category)
                                <a href="{{ $category->url }}">{{ $category->name }}</a>@if (!$loop->last),@endif
                                @endforeach
                                @endif
                            </span>
                            <span><svg width="15" height="15" class="inline-flex mr-2"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg> {{ $post->views }} {{ __('Views') }}</span>
                            <span class="tags">
                                <svg width="15" height="15" class="inline-flex mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>@if (!$post->tags->isEmpty())
                                @foreach ($post->tags as $tag)
                                <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                                @endforeach
                                @endif
                            </span>
                        </div>
                    </header>
                    <div class="post__content">
                        <img src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}"
                            alt="{{ $post->name }}" class="mb-6">
                        {!! clean($post->content, 'youtube') !!}
                        <div class="blog_post_footer">
                            <div class="row justify-content-between align-items-center">

                                <div class="col-md-12">
                                    <div class="btn_wrap">
                                        <span>Share Post</span>
                                        <div class="containerd">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}&title={{ rawurldecode($post->description) }}"
                                                target="_blank" title="{{ __('Share on Facebook') }}"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($post->url) }}&text={{ rawurldecode($post->description) }}"
                                                target="_blank" title="{{ __('Share on Twitter') }}"><i
                                                    class="fab fa-twitter"></i></a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}&source=Linkedin"
                                                title="{{ __('Share on Linkedin') }}" target="_blank"><i
                                                    class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes')
                        <br />
                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
                        @endif
                    </div>
                </article>
            </div>
            <div class="col-sm-3">
                <div class="page-sidebar">
                    {!! Theme::partial('sidebar') !!}
                </div>
            </div>
        </div>
    </div>
<div class="bg-gray-100 py-6">
    <div class="container">
        <div class="related_post">
            <div class="content_title mb-4">
                <h5>{{ __('Related posts') }}</h5>
            </div>
            <div class="row">
                @foreach (get_related_posts($post->slug, 2) as $relatedItem)
                <div class="col-md-4">
                    <div class="blog_post blog_style2 box_shadow1">
                        <div class="blog_img">
                            <a href="{{ $relatedItem->url }}"><img
                                    src="{{ RvMedia::getImageUrl($relatedItem->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                    alt="{{ $relatedItem->name }}"></a>
                        </div>
                        <div class="blog_content bg-white p-4">
                            <div class="blog_text">
                                <h6 class="blog_title"><a href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a>
                                </h6>
                                <div class="post__meta">
                                    <span><svg width="15" height="15" class="inline-flex mr-2"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg> {{ $relatedItem->created_at->format('M d, Y') }}</span>
                                    <span><svg width="15" height="15" class="inline-flex mr-2"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg> {{ $relatedItem->views }} {{ __('Views') }}</span>
                                    </ul>
                                    <p>{{ Str::limit($relatedItem->description, 110) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>