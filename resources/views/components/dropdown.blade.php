{{-- resources/views/components/dropdown.blade.php --}}
<div class="form-group">
    @if($label ?? false)
        <label for="{{ $name ?? $attributes['id'] }}" class="form-label">{{ $label }}</label>
    @endif

    <select
        id="{{ $name ?? $attributes['id'] }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control']) }}
        required
    >
        {{ $slot }}
    </select>

    @error($name)
        <p class="mt-2 text-red-600 text-sm font-medium">{{ $message }}</p>
    @enderror
</div>
