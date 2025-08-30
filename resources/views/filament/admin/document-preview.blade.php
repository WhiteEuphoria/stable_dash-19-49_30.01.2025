@php
    // Support passing a Closure or nothing. If nothing provided, fetch by route record id.
    if (isset($path) && $path instanceof \Closure) {
        $path = $path();
    }
    $path = (string) ($path ?? '');
    if ($path === '') {
        $rid = request()->route('record');
        if ($rid) {
            $doc = \App\Models\Document::find($rid);
            $path = (string) ($doc->path ?? '');
        }
    }
    $rel = '/storage/' . ltrim($path, '/');
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $imgExt = ['jpg','jpeg','png','gif','webp','bmp'];
@endphp

@if ($path === '')
    <div class="text-gray-500">No file uploaded</div>
@elseif (in_array($ext, $imgExt, true))
    <img src="{{ $rel }}" alt="Preview" class="rounded-md border border-gray-200 h-auto" style="max-width:50%;">
@else
    <a href="{{ $rel }}" target="_blank" class="text-primary-600">Open document</a>
@endif
