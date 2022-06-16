@extends('layouts.app')

@section('content')

<?php

$current_sort_num = 1;

?>

<h1 class="add-purpose-title"> Purposeを追加する</h1>

<div class="purpose-title">
<label>Purposeタイトル: <input type="text" class="purpose-title" value=""></label>
</div>

<div class="processes-titles">
<p class="sort-number-title-txt">No.</p>
<p class="process-title-txt">タイトル</p>
<p class="command-title-txt">コマンド</p>
<p class="description-title-txt">説明</p>
</div>

<!-- 入力されたデータはどんな形（配列なのか？）でinsertできるか調べ、よい形のデータにまとめながら下記PHPで
きれいに表現する -->

<?php for($i = 0; $i < $current_sort_num; $i++) {?>
<div class="processes-contents">
    <label class="sort-number"><?php $current_sort_num ?></label>
    <input class="process-title" type="text" value="">
    <input class="process-command" type="text" value="">
    <input class="process-description" type="text" value="">
    <button class="delete-added-process-btn" type="button">削除</button>
</div>
<?php } ?>

<div class="add-new-process">
    <button class="add-new-process-btn" type="button">新しい工程を追加</button>
</div>

<div class="submit-btn-container">
<button class="submit-btn" type="button">OK</button>
</div>

@endsection

<script>
window.addEventListener('DOMContentLoaded', function () { 
    //
    // OKボタン
    // 入力されたすべての情報をデータベースへinsertする
    //
    $(".submit-btn").click(function(){
        const purpose_title = $(".purpose-title").val();
        const sort_number = parseInt($(".sort-number").text());
    });

    //
    // 新しい工程を追加ボタン
    // 新しい工程を入力する欄を追加する
    //
     $(".add-new-process-btn").click(function(){

    });


});
</script>



<style>
div p{
    display: inline;
}



</style>
