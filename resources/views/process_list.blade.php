@extends('layouts.app')

@section('content')

<h1 class="process-title"> Process List</h1>

<div>
    @foreach ($process_datas as $key => $value)
    <div>
    {{ $process_datas[$key]['sort_number'].$process_datas[$key]['title'].$process_datas[$key]['command'].$process_datas[$key]['description'] }}
    </div>

    @endforeach
</div>


@endsection
