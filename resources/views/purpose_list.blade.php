@extends('layouts.app')

@section('content')

<div>
    <h1 class="purpose-title"> Purpose List</h1>
    <a type="button" href="{{ route('purpose.create') }}" class="add-purpose-btn">追加</a>
</div>

<div>
    @foreach ($purpose_datas as $key => $value)
    <div class="purpose-contents-{{ $purpose_datas[$key]['id'] }}">
        <div class="purpose-lists">
            <form method="get" action="{{ route('process.show', $purpose_datas[$key]['id']) }}">
            @csrf
                <button type="submit" class="purpose-title-btn">{{ $purpose_datas[$key]['title'] }}</button>
                <button type="button" data-id="{{$purpose_datas[$key]['id']}}" class="purpose-edit-btn">編集</button>
                <button type="button" data-id={{$purpose_datas[$key]['id']}} class="purpose-delete-btn">削除</button>
            </form> 

        </div>
    </div>
    @endforeach
</div>

@endsection


<script>
window.addEventListener('DOMContentLoaded', function () {    
    //
    //編集ボタン
    //
    $('.purpose-edit-btn').click(function(){

    });

    //
    //削除ボタン
    //
    $('.purpose-delete-btn').click(function(){

    var targetId = $(this).data('id');
        $.ajax({
            url: "purpose/"+targetId,
            type:"delete",
            data:{
                "_token": "{{ csrf_token() }}",
            },
            success: function(response){
                console.log(response);
                $(".purpose-contents-"+targetId).fadeOut();
            },
            error: function (response) {
                console.log('Error:', response);  
                console.log("fail delete");
           
            }
        });
    });
});

</script>


