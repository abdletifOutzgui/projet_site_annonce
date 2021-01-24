
<div>
    @if (session($success))
        <div class="mt-2 alert alert-{{ $type }} col-md-12">{{ session($success) }}</div>
    @endif
</div>
