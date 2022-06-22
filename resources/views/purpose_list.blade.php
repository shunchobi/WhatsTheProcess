@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">
				<div class="table-responsive">
					<div class="add-btn-div"><a type="button" href="{{ route('purpose.create') }}" class="add-purpose-btn btn btn-primary">追加</a></div>
					<table class="table user-list" style="margin-top: 20px auto;">
						<thead>
							<tr>
								<th><span>Title</span></th>
								<th class="text-center"><span>Status</span></th>
								<th class="text-center"><span>Date</span></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($purpose_datas as $value)
							<tr class="purpose-contents-{{ $value->id }}">
								<div>
									<td class="purpose-contents-{{ $value->id }}">
										<div class="icon-title">
											<i class="fa-solid fa-dragon"></i>	
											<a href="{{ route('process.show', $value->id) }}" class="user-link purpose-title-btn">{{ $value->title }}</a>
										</div>
									</td>
									<td style="width: 10%;" class="text-center">
										<span class="label label-default">{{ $value->status }}</span>
									</td>
									<td class="text-center">
										<span class="user-subhead">{{ $value->getNewestUpdateAt() }}</span>
									</td>
									<td style="width: 8%;">
										<div class="trash-block">
											<button type="button" data-id={{ $value->id }} class="purpose-delete-btn table-link danger">
												<i class="fa-solid fa-trash-can"></i>
											</button>
										</div>
									</td>
								</div> 
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<script>
window.addEventListener('DOMContentLoaded', function () {    
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

<style>
	.add-btn-div{
		display: flex;
		padding-bottom: 30px; 
	}

	.add-purpose-btn{
		margin-top: 20px;
	}
</style>
