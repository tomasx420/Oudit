@props(['status'])

@php
    $classes = '';

    if($status == 'Ongoing')
    {
        $classes = 'tag is-warning';
    }
    else if($status == 'Done')
    {
        $classes = 'tag is-success';
    }
    else
    {
        $classes = 'tag is-light';
    }

@endphp

<span {{$attributes->merge(['class' => $classes])}}>{{$status}}</span>

