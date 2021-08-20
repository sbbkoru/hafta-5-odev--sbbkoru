@props([
    'selected' => '',
    'list' => ['a' => 'Aktif', 'p' => 'Pasif'],
    'first' => false,
    'name' => 'status',
])

<select {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}">
    @if ($first)
        <option value="">Lütfen Seçiniz</option>
    @endif

    @forelse ($list as $key => $value)
        <option value="{{ $key }}" @if ($selected == $key) selected @endif>
            {{ $value }}
        </option>
    @empty

    @endforelse
</select>
