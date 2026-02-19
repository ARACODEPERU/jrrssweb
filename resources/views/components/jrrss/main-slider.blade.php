@props(['slides'])

<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual
            dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover
            show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0"
     data-plugin-options="{'autoplayTimeout': 6500}"
     data-dynamic-height="['650px','650px','650px','550px','300px']"
     style="height: 650px;">
    <div class="owl-stage-outer">
        <div class="owl-stage ara_centrado_total">
            @foreach ($slides as $slide)
                <div class="owl-item position-relative" style="background-size: cover; background-position: center; height: 100%;">
                    <img src="{{ asset('storage/' . $slide->content) }}"
                         alt="Slide {{ $loop->iteration }}"
                         style="max-width: 100%; height: auto; transform: translate(-50%, -50%);">
                </div>
            @endforeach
        </div>
    </div>
    <div class="owl-dots mb-5">
        @foreach ($slides as $key => $slide)
            <button role="button" class="owl-dot {{ $loop->first ? 'active' : '' }}" aria-label="Ir a la diapositiva {{ $loop->iteration }}"><span></span></button>
        @endforeach
    </div>
</div>