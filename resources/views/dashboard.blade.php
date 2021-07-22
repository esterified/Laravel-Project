<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Ami Coding Parina') }} 
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
            <li style="color: rgb(148 6 6);background-color: rgb(234 180 180 / 45%);padding: 5px;margin-bottom: 10px;">
                {{ $error }}
            </li>
            </ul>
            @endforeach
            
            </div>
            @endif
            <form method="POST" action="{{ route('khoj') }}">
                @csrf
                <div>
                    <x-jet-label for="input" value="{{ __('Input Values') }}" style="font-weight: 800;" />
                    <x-jet-input id="input" name="input" class="block mt-1 w-full" type="text" placeholder="e.g. 10, 2, 4, 15, 11" value="{{ old('input')}}"  required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="value" value="{{ __('Search Value') }}" style="font-weight: 800;"/>
                    <x-jet-input id="value"  name="value" class="block mt-1 w-full" type="number" placeholder="search value" value="{{ old('value')}}" required />
                </div>

                <div class="flex-fill items-center justify-start start mt-4">
                    <x-jet-button class="mr-4">
                        {{ __('Khoj') }}
                    </x-jet-button>
                </div>
                {{--  section to show the result of the search--}}
                
                @if(session('flag'))
                <div class="alert alert-success mt-2" style="font-weight: bold;color: green; padding: 10px; background: #00800038;" >
                    @if(session('flag')==2)
                    {{__('TRUE')}}
                    @else
                    {{__('FALSE')}}
                    @endif
                </div>
                @endif
                {{--  section to show the result of the search--}}
            </form>
        </div>
    </div>
</x-app-layout>
