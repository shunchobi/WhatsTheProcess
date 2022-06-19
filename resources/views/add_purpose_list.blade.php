@extends('layouts.app')

@section('content')


@php
$current_sort_num = 10;
@endphp


<h1 class="add-purpose-title"> PurposeとProcessを追加する</h1>


<form method="post" action="{{ route('purpose.store') }}" id="purpose-data-title">
@csrf
<div class="purpose-title-block">
        <input placeholder="Purposeタイトル" type="text" class="purpose-title" name="purpose_title" value="">
</div>

    <table class="add_p_table">
        <thead>
            <tr>
                <th class="add_p_th">No.</th>
                <th class="add_p_th">タイトル</th>
                <th class="add_p_th">コマンド</th>
                <th class="add_p_th">説明</th>
            <tr>
        <thead>
        <tbody>
            @for ($i = 1; $i <= $current_sort_num; $i++) 
            <tr>
                <td class="sort-num"><label class="sort-number"> {{ $i }} </label></td>
                <td><input class="process-title-input" type="text" value="" name="title[]"></td>
                <td><input class="process-command" type="text" value="" name="command[]"></td>
                <td><textarea class="process-description" type="text" value="" name="description[]"></textarea></td>
            </tr>
            @endfor
        </tbody>
    </table>
</form>


<!-- form外にbuttonを設けて、type="button"とし、JSからsubmitしている理由は、
2つのform区画内のvalueを１つのbuttonから、それぞれのコントローラーのstoreにsubmitしたくて、それをきれいにまとめたかったから。 -->
<div class="add-purpose-submit-block">
    <button class="add-purpose-submit-btn btn btn-primary" type="button">OK</button>
</div>

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

