<div class="row" id="dsc__cta">
    @if ($config['button_layout'] == 'right')
    <div class="col-sm-9">
        <aside id="text-2" class="widget widget_text">
            <div class="textwidget">
                <h4>{{ $config['name'] }}</h4>
                <h3>{{ $config['subtitle'] }}</h3>
            </div>
        </aside>
    </div>
    <div class="col-sm-3">
        <aside id="custom_html-2" class="widget_text widget widget_custom_html">
            <div class="textwidget custom-html-widget"><a href="{{ $config['btn_link'] }}"
                    class="btn btn-block rounded-full btn-outline-white btn-fill-out">{{ $config['btn_title'] }}</a></div>
        </aside>
    </div>
    @else
        <div class="col-sm-12">
            <aside id="text-2" class="widget widget_text">
                <div class="textwidget">
                    <h4>{{ $config['name'] }}</h4>
                    <h3>{{ $config['subtitle'] }}</h3>
                </div>
            </aside>
        </div>
        <div class="col-sm-12">
            <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                <div class="textwidget custom-html-widget"><a href="{{ $config['btn_link'] }}"
                        class="btn btn-block rounded-full btn-outline-white btn-fill-out">{{ $config['btn_title'] }}</a></div>
            </aside>
        </div>
    @endif
</div>