@extends('layouts.app')

@section('content')

<h1 class="purpose-title"> Purpose List</h1>

<div>
    @foreach ($purpose_datas as $key => $value)
    <div>
        <h2>{{$purpose_datas[$key]['title']}}</h2>
        <form method="get" action="{{ route('process.show', $purpose_datas[$key]['id']) }}">
            <div class="purpose-lists">
                <!-- <form method="get" acton="process/{{ $purpose_datas[$key]['id'] }}"> -->
                <button type="submit" class="purpose-title-btn">{{ $purpose_datas[$key]['title'] }}</button>
                <!-- </form> -->
                <button type="button" data-id="{{$purpose_datas[$key]['id']}}" class="purpose-edit-btn">編集</button>
                <button type="button" data-id="{{$purpose_datas[$key]['id']}}" class="purpose-delete-btn">削除</button>
            </div>
        </form> 
    </div>
    @endforeach
</div>

@endsection

<script>
window.addEventListener('DOMContentLoaded', function () {

});
</script>
