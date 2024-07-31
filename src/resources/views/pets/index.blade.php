<x-layout>
    <div class="space-y-4">
        @foreach ($pets as $pet)
            @if (isset($pet['name']))
                <p>{{$pet['name']}}</p>
            @else
                <p>Name is unknow</p>
            @endif
        @endforeach
    </div>
</x-layout>
