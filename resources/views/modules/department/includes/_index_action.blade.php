{{-- @ability('Admin', 'edit_department') --}}
<button type="button" data-id="{{ $department->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_department') --}}
<form style="display:inline;" method="POST" action="{{ route('department.destroy', $department->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
