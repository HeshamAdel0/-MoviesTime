@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Tags</h3>
		    	<table class="table table-bordered table-hover">
                    <thead>                  
                      <tr>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                    </thead>
                    {{--Check If Have Tags Or No--}}
                    @if($tags->count() > 0)
	                    <tbody>
	                      {{--Get All User In DataBase--}}
	                      @foreach($tags as $tag )
	                          <tr>
	                              <td>{{$tag->name}}</td>
	                              <td>
	                              	{{--Check Have Permission Edit Tag--}}
									@if (Auth::user()->hasPermission('update_tags'))
		                                <a href="{{Route('tag.edit', ['id'=>$tag->id])}}" class="btn btn-primary">
		                                  <i class="fa fa-edit"></i> Edit
		                                </a>
	                                @else
								        <button class="btn btn-primary" disabled>
							          		<i class="fa fa-edit"></i> Edit
							          	</button>
							        @endif  
	                              </td>
	                              <td>
	                              	{{--Check Have Permission Delete Tag--}}
									@if (Auth::user()->hasPermission('delete_tags'))
		                                <a href="{{Route('tag.delete', ['id'=>$tag->id])}}" class="btn btn-danger">
		                                  <i class="fa fa-trash"></i> Delete
		                                </a>
	                                @else
								        <button class="btn btn-danger" disabled>
							          		<i class="fa fa-trash"></i> Delete
							          	</button>
							        @endif  
	                            </td>
	                          </tr>
	                      @endforeach
	                  </tbody>
                	@else
	                  <div class="alert alert-warning" role="alert">
	                      <h4> No have Any <strong> Tags </strong> </h4>
	                  </div>
              		@endif <!-- end Check -->   
                </table>	
		    </div>
		</div>    
	</div>
</div>	
@endsection