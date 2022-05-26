<div id="about">

    <section class="col-main col-sm-9 wow bounceInUp animated about">

        <div class="policy-image-container">
            @if(!is_video($config->photo))
                <img src="{{ asset('images/img/'. $config->photo) }}" alt="">
            @else
                <video controls>
                    <source
                        src="{{asset('images/img/'.$config->photo)}}"
                        type="video/mp4">
                    <source
                        src="{{asset('images/img/'.$config->photo)}}"
                        type="video/quicktime">
                    Your browser does not support the video
                    tag.
                </video>
            @endif
        </div>
        <div class="page-title">
            <h2>{{ LanguageHelper::configTranslate($config) }}</h2>
        </div>
        <div class="static-contain">
            {!! LanguageHelper::configValue($config)  !!}

        </div>
    </section>
</div>
