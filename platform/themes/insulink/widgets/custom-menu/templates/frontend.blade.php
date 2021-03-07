<aside class="widget">
    <div class="widget__header">
        <h3 class="widget__title">{{ $config['name'] }}</h3>
    </div>
    <div class="widget__content">
        {!!
        Menu::generateMenu([
        'slug' => $config['menu_id'],
        'options' => ['class' => 'footer-menu', 'role' => 'menu'],
        ])
        !!}
    </div>
</aside>
