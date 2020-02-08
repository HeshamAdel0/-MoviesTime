@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-12">
		 	<div class="tile">
		    	<h3 class="tile-title">Categories</h3>	
		    	<div class="card-body">
      				<ul>
			            @foreach($parentCategories as $category)
			                <li>
			                    {{ $category->name }}
			                    {{-- Check Have Permission Update Category --}}
				                @if (Auth::user()->hasPermission('update_category'))
			                    	<a href="{{Route('category.edit', ['id' => $category->id ])}}" class="btn btn-primary">Edit</a>
			                    @else
			                    	<button class="btn btn-primary" disabled>Edit</button>
			                    @endif 
			                    {{-- Check Have Permission Delete Category --}}
			                    @if (Auth::user()->hasPermission('delete_category'))
			                    	<a href="{{Route('category.delete', ['id' => $category->id ])}}" class="btn btn-danger">Delete</a>
			                    @else
			                    	<button class="btn btn-danger" disabled>Delete</button>
			                    @endif

		                    </li>    
				            @if(count($category->subcategory))
		                         @include('category.subCategoryLv2',['subcategories' => $category->subcategory])
		                    @endif 
			            @endforeach
			        </ul>
      			</div>
		    </div>
		</div>
	</div>
</div>
@endsection