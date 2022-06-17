@extends('layouts.app')

@section('content')

<div class="process-title">
    <h2>{{ $purpose_title }}</h2>
</div>

@foreach ($process_datas as $key => $value)
        @if ($value->sort_number > 0)
        <div class="contens-edit-part">
            <a class="js_edit_button" data-process-id="{{ $value->id }}">edit</a>
            <div class="number-block">
                <p class="sort-number">{{  $process_datas[$key]['sort_number'] }}</p>
                <div class="contents-block">
                    <div class="code-edit">
                        <p class="code">{{ $process_datas[$key]['command'] }}</p>
                    </div>
                    <p class="title">-{{ $process_datas[$key]['title'] }}-</p>
                    <p class="description">{{ $process_datas[$key]['description'] }}</p>
                </div>
            </div>
        </div>
            
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


@endsection

<script>
    window.addEventListener('DOMContentLoaded', function () {    
        $(".js_edit_button").click(function() {
            const processId = $(this).data("process-id");
            $("#edit-form-" + processId).toggle();
        })
    });
</script>

<style>
    .process-title{
        text-align: center;
        margin: 20px 0px 40px 0px;
    }
    .contents-block{
        border: groove;
        border: 1px solid #aaaaaa; /* 境界線を実線で指定する */
        background: #F0F8FF; /* 背景の色を指定する */
        text-align: center; /* インライン要素のセンタリングを指定する */
        width: 60%; /* 要素の横幅を指定する */
        margin: 0px auto; /* ブロックレベル要素のセンタリングを指定する */
        margin-bottom: 10px;
        display: inline-block;
        vertical-align:  middle; 
    }
    .code{
        font-size: 25px;
        text-align: left;
        margin-bottom: 0px;
    }
    .js_edit_button{
        text-align: right;
        display: block;
        width: 80%;
    }
    .title{
        margin-bottom: 2px;
        margin-left: 10px;
        margin-top: 8px;
        text-align: left;
    }
    .description{
        margin-bottom: 2px;
        margin-left: 10px;
        text-align: left;
    }
    .code-edit{
        padding-top: 0px;
        text-align: left;
    }
    .edit{
        text-align: right;
    }
    .contens-edit-part{
        text-align: center;
        margin: 0px;
    }

    .code{
        border-bottom: 2px solid #32a1ce;
        display: inline-block;
        margin-left: 5px;
    }
    .number-block{

    }
    .sort-number{
        display: inline-block;
        vertical-align:  middle; 
        margin: 0px 20px;
        font-size: 20px;
    }
</style>

