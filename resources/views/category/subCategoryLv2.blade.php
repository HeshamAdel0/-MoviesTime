
@foreach($subcategories as $subcategory)
        <ul>
            <li>{{$subcategory->name}}
            	{{-- Check Have Permission Update Category --}}
				@if (Auth::user()->hasPermission('update_category'))
	            	<a href="{{Route('category.edit', ['id' => $subcategory->id ])}}" class="btn btn-primary">Edit</a>
	            @else
                	<button class="btn btn-primary" disabled>Edit</button>
                @endif
	            {{-- Check Have Permission Delete Category --}}
			    @if (Auth::user()->hasPermission('delete_category'))
	            	<a href="{{Route('category.delete', ['id' => $subcategory->id ])}}" class="btn btn-danger">Delete</a>
	            @else
                	<button class="btn btn-danger" disabled>Delete</button>
                @endif

            </li>
	    @if(count($subcategory->subcategory))
            @include('category.subCategoryLv3',['subcategories' => $subcategory->subcategory])
        @endif
        </ul> 
@endforeach