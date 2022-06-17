@extends('layouts.app')

@section('content')



<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">
				<div class="table-responsive">
					<table class="table user-list">
						<thead>
							<tr>
								<th><span>Title</span></th>
								<th class="text-center"><span>Status</span></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="icon-title">
										<i class="fa-solid fa-dragon"></i>	
										<a href="#" class="user-link">Mila Kunis</a>
									</div>
									<!-- <span class="user-subhead">2013/08/08</span> -->
								</td>
								<td style="width: 20%;" class="text-center">
									<span class="label label-default">Inactive</span>
									<span class="slash">/</span>	
									<span class="user-subhead">2013/08/08</span>
								</td>
								<td style="width: 8%;">
									<div class="trash-block">
										<a href="#" class="table-link danger">
											<i class="fa-solid fa-trash-can"></i>
										</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection