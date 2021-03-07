<div class="aside-box">
    <div class="aside-box-header">
        <h4>{{ $config['name'] }}</h4>
    </div>
    <div class="aside-box-content">
       <ul class="social-links">
           @if ($config['twitter_link'])
               <li class="social-icon twitter"><a href="{{ $config['twitter_link'] }}" target="_blank" rel="noopener noreferrer"></a>
            </li>
           @endif
            
            @if ($config['facebook_link'])
                <li class="social-icon facebook"><a href="{{ $config['facebook_link'] }}" target="_blank" rel="noopener noreferrer"></a>
                </li>
            @endif
            @if ($config['linkedn_link'])
                <li class="social-icon linkedin"><a href="{{ $config['linkedn_link'] }}" target="_blank" rel="noopener noreferrer"></a>
                </li>
            @endif
            @if ($config['youtube_link'])
                <li class="social-icon youtube"><a href="{{ $config['youtube_link'] }}" target="_blank" rel="noopener noreferrer"></a>
                </li>
            @endif
        </ul>
    </div>
</div>

