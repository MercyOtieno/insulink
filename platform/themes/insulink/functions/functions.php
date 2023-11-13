<?php

register_page_template([
    'default' => 'Default',
    'homepage' => 'Homepage',
    'blog-sidebar' => 'Blog Sidebar'
]);

register_sidebar([
    'id'          => 'second_sidebar',
    'name'        => 'Second sidebar',
    'description' => 'This is a sample sidebar for insulink theme',
]);
register_sidebar([
    'id'          => 'bottom-cta',
    'name'        => 'Bottom Sidebar',
    'description' => 'you can add a Call to action or a Newsletter here',
]);

register_sidebar([
    'id' => 'footer_a',
    'name' => 'Footer A',
    'description' => 'Sidebar in the footer of site',
]);
register_sidebar([
    'id' => 'footer_b',
    'name' => 'Footer B',
    'description' => 'Sidebar in the footer of site',
]);

register_sidebar([
    'id' => 'footer_c',
    'name' => 'Footer C',
    'description' => 'Sidebar in the footer of site',
]);
register_sidebar([
    'id' => 'footer_d',
    'name' => 'Footer D',
    'description' => 'Sidebar in the footer of site',
]);

theme_option()
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => '© 2023 Insulink LTD. All right reserved.',
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 250,
            ]
        ],
        'helper' => __('Copyright on footer of site'),
    ])
    ->setField([
        'id'         => 'preloader_enabled',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'select',
        'label'      => __('Enable Preloader?'),
        'attributes' => [
            'name'    => 'preloader_enabled',
            'list'    => [
                'no'  => 'No',
                'yes' => 'Yes',
            ],
            'value'   => 'no',
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'hotline',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => 'Hotline',
        'attributes' => [
            'name'    => 'hotline',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => 'Hotline',
                'data-counter' => 30,
            ],
        ],
    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => 'Address',
        'attributes' => [
            'name'    => 'address',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => 'Address',
                'data-counter' => 180,
            ],
        ],
    ])
    ->setField([
        'id'         => 'email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'email',
        'label'      => 'Email',
        'attributes' => [
            'name'    => 'email',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => 'Email',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setField([
    'id' => 'claim',
    'section_id' => 'opt-text-subsection-general',
    'type' => 'text',
    'label' => 'Claims Url',
    'attributes' => [
        'name' => 'claim',
        'value' => null,
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'Claims Url',
            'data-counter' => 200,
        ],
    ],
])
->setSection([
        'title'      => __('Header'),
        'desc'       => __('Options for header'),
        'id'         => 'opt-text-subsection-header',
        'subsection' => true,
        'icon'       => 'fas fa-magic',
])
->setField([
        'id'         => 'enable_sticky_header',
        'section_id' => 'opt-text-subsection-header',
        'type'       => 'select',
        'label'      => 'Enable sticky header?',
        'attributes' => [
            'name'    => 'enable_sticky_header',
            'list'    => [
                'yes' => 'Yes',
                'no'  => 'No',
            ],
            'value'   => 'yes',
            'options' => [
                'class' => 'form-control',
            ],
        ],
])
->setSection([
        'title'      => __('Insurance Products'),
        'desc'       => __('Options for Insurance Products page'),
        'id'         => 'opt-text-subsection-header',
        'subsection' => true,
        'icon'       => 'fas fa-magic',
])
->setField([
        'id'         => 'enable_sticky_header',
        'section_id' => 'opt-text-subsection-header',
        'type'       => 'number',
        'label'      => 'Number of Years allowed?',
        'attributes' => [
            'name'    => 'years_allowed',
            'value'   => '15',
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'Claims Url',
                'data-counter' => 200,
            ],
        ],
]);

add_action('init', function () {
    config(['filesystems.disks.public.root' => public_path('storage')]);
}, 124);

add_shortcode('slideshow', 'DSC Slider', 'Slider', function() {
    return Theme::partial('short-codes.slider');
});
add_shortcode('motor_private_home', 'Motor Private Home', 'Motor Private Home', function() {
    return Theme::partial('short-codes.motor_private_home');
});
add_shortcode('domestic_home', 'Domestic Home', 'Domestic Home', function() {
    return Theme::partial('short-codes.domestic-home');
});
add_shortcode('business', 'Business', 'Business', function() {
    return Theme::partial('short-codes.business');
});
add_shortcode('callback', 'Call Back form', 'Call Back form', function() {
    return Theme::partial('short-codes.callback');
});

add_shortcode('faqs', 'Frequently Asked Questions', 'Frequently Asked Questions', function() {
    return Theme::partial('short-codes.faqs');
});

add_shortcode('why_us', 'Why Us', 'Why Us', function() {
    return Theme::partial('short-codes.whyus');
});
add_shortcode('motor_private', 'Motor Private', 'Motor Private', function() {
    return Theme::partial('short-codes.motor-private');
});
add_shortcode('health-individual', 'Health Individual', 'Health Individual', function() {
    return Theme::partial('short-codes.health-individual');
});
add_shortcode('health-corporate', 'Health Corporate', 'Health Corporate', function() {
    return Theme::partial('short-codes.health-corporate');
});
add_shortcode('domestic', 'Home Insurance', 'Home Insurance', function() {
    return Theme::partial('short-codes.domestic');
});
add_shortcode('travel', 'Travel Insurance', 'Travel Insurance', function() {
    return Theme::partial('short-codes.travel');
});
add_shortcode('personalaccident', 'Personal Accident Insurance', 'Personal Accident Insurance', function() {
    return Theme::partial('short-codes.pa');
});
add_shortcode('claims', 'File a Claim Form', 'File a Claim Form', function() {
    return Theme::partial('short-codes.claims');
});
add_shortcode('genforrm', 'Generic Form', 'Generic Form', function() {
    return Theme::partial('short-codes.requestform');
});
add_shortcode('ira', 'IRA License', 'IRA License', function() {
    return Theme::partial('short-codes.ira');
});
