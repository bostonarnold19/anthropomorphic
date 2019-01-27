{{-- @ability('Admin', 'edit_employee') --}}
<button type="button" data-id="{{ $employee->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_employee') --}}
<form style="display:inline;" method="POST" action="{{ route('employee.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
