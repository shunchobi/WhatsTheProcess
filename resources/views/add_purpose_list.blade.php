@extends('layouts.app')

@section('content')


@php
$current_sort_num = 10;
@endphp


<h1 class="add-purpose-title"> Purposeを追加する</h1>


<form method="post" action="{{ route('purpose.store') }}" id="purpose-data-title">
@csrf
<div class="purpose-title">
<label>Purposeタイトル: <input type="text" class="purpose-title" name="purpose_title" value=""></label>
</div>

<div class="processes-titles">
<p class="sort-number-title-txt">No.</p>
<p class="process-title-txt">タイトル</p>
<p class="command-title-txt">コマンド</p>
<p class="description-title-txt">説明</p>
</div>

@for ($i = 1; $i <= $current_sort_num; $i++) 
<div class="processes-contents">
    <label class="sort-number"> {{ $i }} </label>
    <input class="process-title" type="text" value="" name="title[]">
    <input class="process-command" type="text" value="" name="command[]">
    <textarea class="process-description" type="text" value="" name="description[]"></textarea>
</div>
@endfor
</form>

<!-- form外にbuttonを設けて、type="button"とし、JSからsubmitしている理由は、
2つのform区画内のvalueを１つのbuttonから、それぞれのコントローラーのstoreにsubmitしたくて、それをきれいにまとめたかったから。 -->
<button class="submit-btn" type="button">OK</button>

@endsection

<script>
window.addEventListener('DOMContentLoaded', function () { 
    //
    // OKボタン
    // 入力されたすべての情報をデータベースへinsertする
    //
    $(".submit-btn").click(function(){
        $("#purpose-data-title").submit();
    });
});
</script>



<style>
div p{
    display: inline;
}
</style>
