{{-- @ability('Admin', 'edit_employment_type') --}}
<button type="button" data-id="{{ $employment_type->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_employment_type') --}}
<form style="display:inline;" method="POST" action="{{ route('employment-type.destroy', $employment_type->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
