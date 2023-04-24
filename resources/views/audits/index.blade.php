@php
    use Carbon\Carbon;

    $index = 0;
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="columns">
            <div class="column is-four-fifths">
                <h1 class="font-semibold title is-2 px-5 text-gray-800 dark:text-gray-200 leading-tight">
                    Audits
                </h1>
            </div>
            <div class="column">
                <a class="button is-info is-light is-medium ml-6" href="{{route('audits.create')}}">Add new audit</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="notification is-light is-info">
                    {{ session('status') }}
                </div>
            @endif
            <div class="box bg-gray-800">
                <table class="table bg-gray-800 table" style="width:100%">
                    <thead>
                    <tr>
                        <th>
                            ID Number
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Started on
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($audits as $audit)
                        <tr class="{{$index % 2 ? 'bg-gray-900' : 'bg-gray-800'}}">
                            @php
                                $index++;
                            @endphp
                            <th>
                                {{$audit->id}}
                            </th>
                            <th>
                                {{$audit->name}}
                            </th>
                            <th>
                                {{$audit->type->name}}
                            </th>
                            <th>
                                <x-status :status="$audit->status"></x-status>
                            </th>
                            <th>
                                {{Carbon::parse($audit->created_at)->format('d/m/y H:i')}}
                            </th>
                            <th>
                                <a class="button is-info" href="{{route('audits.show', $audit)}}">View</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        th {
            color: white !important;
            vertical-align: middle !important;
        }
    </style>
</x-app-layout>
