@extends('layouts.app')



@section('content')



<form method="post" action="{{ route('purpose.update', $purpose_id) }}" class="process-title" id="purpose-title-form">
@csrf
@method("PATCH")
    <h2 class="purpose-title-text">{{ $purpose_title }}</h2>
    <input name="title" type="text" class="purpose-title-field" placeholder="{{ $purpose_title }}" style="display: none;">
    <a type="button" class="purpose-title-edit-btn" style="margin-left: 20px; padding-top: 5px;">Edit</a>
    <button type="submit" class="purpose-title-ok-btn btn btn-primary" style="display: none; margin-left: 20px;">OK</button>
</form>

    @foreach ($process_datas as $key => $value)
        @if ($value->sort_number > 0)
            <div class="contens-edit-part">
            <div class="content">

                <form method="post" 
                        action="{{ route('process.update', $value->id) }}" 
                        style="display: none;" 
                        id="edit-form-{{ $value->id }}"
                        class="data-list-content">
                    @csrf
                    @method("PATCH")
                    <p class="sort-number">{{  $process_datas[$key]['sort_number'] }}</p>
                    <div class="contents-block">
                        <input class="process-command code" style="border: 1px solid black;" type="text" value="{{ $value->command }}" name="command">
                        <input class="title" type="text" value="{{ $value->title }}" name="title">
                        <textarea class="description" type="text" value="{{ $value->description }}" name="description">{{ $value->description }}</textarea>
                    </div>
                    <button class="js_edit_button updata-btn btn btn-primary" type="submit">Update!</button>
                </form>


                <!-- リストデータ表示ブロック -->
                <div class="data-list-content" id="data-list-{{ $value->id }}">
                    <p class="sort-number">{{  $process_datas[$key]['sort_number'] }}</p>
                    <div class="contents-block">
                        <p class="code">{{ $process_datas[$key]['command'] }}</p>
                        <p class="title">-{{ $process_datas[$key]['title'] }}-</p>
                        <p class="description">{{ $process_datas[$key]['description'] }}</p>
                    </div>
                    <a class="js_edit_button" data-process-id="{{ $value->id }}">Edit</a>
                    <form method="post" action="{{ route('process.destroy', $value->getId()) }}">
                    @csrf
                    @method('delete')
                        <button class="js_delete_button" style="color: red;" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach

@endsection

<script>
let isEditingTitle = false;
</script>


<script>
    window.addEventListener('DOMContentLoaded', function () {    
        $(".js_edit_button").click(function() {
            const processId = $(this).data("process-id");
            $("#edit-form-" + processId).toggle();
            $("#data-list-" + processId).toggle();
        })


        $(".purpose-title-edit-btn").click(function(){
            $(".purpose-title-text").toggle();
            $(".purpose-title-field").toggle();
            $(".purpose-title-ok-btn").toggle();
            $(".purpose-title-edit-btn").toggle();
        });

        $(".purpose-title-ok-btn").click(function(){
            $(".purpose-title-text").toggle();
            $(".purpose-title-field").toggle();
            $(".purpose-title-ok-btn").toggle();
            $(".purpose-title-edit-btn").toggle();
        });
    });
</script>