<?php

use Botble\Widget\AbstractWidget;

class CallToActionWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'call_to_action';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => 'Call To Action',
            'description' => __('This is a sample widget'),
            'btn_link' => '#',
            'btn_title' => 'Send',
            'button_layout' => 'right',
            'subtitle' => __('This is a sample widget')
        ]);
    }
}
