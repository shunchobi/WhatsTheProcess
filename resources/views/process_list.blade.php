@extends('layouts.app')



@section('content')

<div class="process-title">
    <h2>{{ $purpose_title }}</h2>
</div>

@foreach ($process_datas as $key => $value)
    @if ($value->sort_number > 0)
        <div class="contens-edit-part">
            <div class="content">
                
                <!-- 編集画面ブロック 
                    ブロック構成を定める
                    各ブロックのレイアウトをCSSで調整
                    　
                -->
                <!-- <form method="post" 
                        action="{{ route('process.update', $value->id) }}" 
                        style="display: none;" 
                        class="edit-form-block" 
                        id="edit-form-{{ $value->id }}">
                    @csrf
                    @method("PATCH")
                    <p class="sort-number">{{  $process_datas[$key]['sort_number'] }}</p>
                    <div class="edit-contents">
                        <div class="edit-command">
                            <input class="process-command" type="text" value="{{ $value->command }}" name="command">
                        </div>
                        <input class="process-title" type="text" value="{{ $value->title }}" name="title">
                        <textarea class="process-description" type="text" value="{{ $value->description }}" name="description">{{ $value->description }}</textarea>
                        <button type="submit">Update!</button>
                    </div>
                </form> -->


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
                    <button class="js_edit_button updata-btn" type="submit">Update!</button>
                </form>


                <!-- リストデータ表示ブロック -->
                <div class="data-list-content" id="data-list-{{ $value->id }}">
                    <p class="sort-number">{{  $process_datas[$key]['sort_number'] }}</p>
                    <div class="contents-block">
                        <p class="code">{{ $process_datas[$key]['command'] }}</p>
                        <p class="title">-{{ $process_datas[$key]['title'] }}-</p>
                        <p class="description">{{ $process_datas[$key]['description'] }}</p>
                    </div>
                    <a class="js_edit_button" data-process-id="{{ $value->id }}">edit</a>
                </div>
            </div>
        </div>
    @endif
@endforeach
@endsection


<script>
    window.addEventListener('DOMContentLoaded', function () {    
        $(".js_edit_button").click(function() {
            const processId = $(this).data("process-id");
            $("#edit-form-" + processId).toggle();
            $("#data-list-" + processId).toggle();
        })
    });
</script>