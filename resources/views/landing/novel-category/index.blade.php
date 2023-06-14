<x-landing-layout>
    @foreach ($novels as $novel)
    {{ $novel->title }}
@endforeach
</x-landing-layout>

