@php
    $index = 1;

    $answer;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="columns">
            <div class="column is-four-fifths">
                <h1 class="font-semibold title is-2 px-5 text-gray-800 dark:text-gray-200 leading-tight">
                    {{$audit->name}} Audit
                </h1>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="box bg-gray-800 text-white">
                <div class="pb-5">
                    <h4 class="title is-4 text-white">Type: {{$audit->type->name}}</h4>
                </div>
                <div class="pb-5">
                    <h4 class="title is-4 text-white">Creator: {{$audit->user->name}} ({{$audit->user->email}})</h4>
                </div>
                <div class="pb-5">
                    <h4 class="title is-4 text-white">Creation date: {{$audit->created_at}}</h4>
                </div>
                <div class="pb-5">
                    <h4 class="title is-4 text-white">Status: <x-status :status="$audit->status"></x-status></h4>
                </div>

                <div class="pb-3">
                    <h4 class="title is-4 text-white">Questions: </h4>
                </div>
                @foreach($questions as $question)
                    <div class="pb-2">
                        <h5 class="title is-5 text-white pb-1">{{$index}}. {{$question->question}}</h5>
                        @php
                            $index++;
                            $answer = $audit->answers()->where('question_id', $question->id)->first()
                        @endphp

                        <div class="pb-3">
                            @if($answer)
                                @if($question->isItWithOpenAnswer == 1)
                                    <p>{{$answer->answer}}</p>
                                @else
                                    <p>{{$answer->answer == 1 ? 'Yes' : 'No'}}</p>
                                @endif
                            @else
                                <p>Not answered yet</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="pt-5">
                    @if($audit->status == 'Ongoing' || $audit->status == 'on-going')
                        <a class="button is-info" href="{{route('audits.edit', $audit)}}">Fill in questions</a>
                    @endif
                    <a class="button is-danger is-light" href="{{route('audits.index')}}">Go back</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        h5 {
            margin-bottom: 0px !important;
        }
    </style>
</x-app-layout>
