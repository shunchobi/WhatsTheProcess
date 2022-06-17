@extends('layouts.app')

@section('content')

<div>   
    <h2>{{ $purpose_title }}</h2>
    @foreach ($process_datas as $key => $value)
        @if ($value->sort_number > 0)
            <div>
                {{ $process_datas[$key]['sort_number'].$process_datas[$key]['title'].$process_datas[$key]['command'].$process_datas[$key]['description'] }}
            </div>
            <a class="js_edit_button" data-process-id="{{ $value->id }}">edit</a>
            <div id="edit-form-{{ $value->id }}" style="display: none;">
                <form method="post" action="{{ route('process.update', $value->id) }}">
                    @csrf
                    @method("PATCH")
                    <input class="process-title" type="text" value="{{ $value->title }}" name="title">
                    <input class="process-command" type="text" value="{{ $value->command }}" name="command">
                    <textarea class="process-description" type="text" value="{{ $value->description }}" name="description">{{ $value->description }}</textarea>
                    <button type="submit">Update!</button>
                </form>
            </div>
        @endif
    @endforeach
</div>


@endsection

<script>
    window.addEventListener('DOMContentLoaded', function () {    
        $(".js_edit_button").click(function() {
            const processId = $(this).data("process-id");
            $("#edit-form-" + processId).toggle();
        })
    });
</script>

