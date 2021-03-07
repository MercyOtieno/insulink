<?php

use Botble\Widget\AbstractWidget;

class SocialMediaWidget extends AbstractWidget
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
    protected $widgetDirectory = 'social_media';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name' => 'Social Media',
            'facebook_link'        => 'http://facebook.com/your_company',
            'twitter_link'        => 'http://twitter.com/your_company',
            'linkedn_link'        => 'http://linkedin.com/your_company',
            'youtube_link'        => 'http://youtube.com/your_company',
            'description' => __('Add Social Media Links'),
        ]);
    }
}
