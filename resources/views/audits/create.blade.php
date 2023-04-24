<x-app-layout>
    <x-slot name="header">
        <div class="columns">
            <div class="column is-four-fifths">
                <h1 class="font-semibold title is-2 px-5 text-gray-800 dark:text-gray-200 leading-tight">
                    Create new audit
                </h1>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="box bg-gray-800">
                <form method="POST" action="{{route('audits.store')}}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Audit name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Audit type -->
                    <div class="py-5">
                        <x-input-label for="type_id" :value="__('Audit type')" />
                        <select name="type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose an audit type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
                    </div>
                    <div class="pt-5">
                        <button class="button is-info" onclick="submit">Create</button>
                        <a class="button is-danger is-light" href="{{route('audits.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
