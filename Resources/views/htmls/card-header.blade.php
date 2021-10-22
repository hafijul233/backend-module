<div class="card-header bg-white">
    <h4 class="card-title">
        <i class="{{ $icon }}"></i>
        {{ $title }}
    </h4>
    @if(isset($short) && strlen($short) > 0)
        <p class="card-title-desc mb-0">
            {!! $short !!}
        </p>
    @endif
</div>
