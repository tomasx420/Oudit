@php
    $index = 1;
    $answerObject;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="columns">
            <div class="column is-four-fifths">
                <h1 class="font-semibold title is-2 px-5 text-gray-800 dark:text-gray-200 leading-tight">
                    Fill in the {{$audit->name}} audit
                </h1>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="box bg-gray-800">
                <form method="POST" action="{{route('audits.update', $audit)}}">
                    @method('PUT')
                    @csrf

                    @foreach($questions as $question)
                        <label for="question-{{$index}}"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{$index}}. {{$question->question}}
                        </label>
                        @php
                            $index++;
                            $answerObject = $audit->answers->where('question_id', $question->id)->first()
                        @endphp
                        @if($question->isItWithOpenAnswer)
                            <textarea name="{{$question->id}}" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Write your answer here...">{{$answerObject ? $answerObject->answer : ''}}</textarea>
                        @else
                            <div class="py-5">
                                <select name="{{$question->id}}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select an answer</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <x-input-error :messages="$errors->get('type_id')" class="mt-2"/>
                            </div>
                        @endif
                    @endforeach
                    <div class="pt-5">
                        <button class="button is-info" onclick="submit">Save</button>
                        <a class="button is-danger is-light" href="{{route('audits.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
