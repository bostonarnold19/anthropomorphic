{{-- @ability('Admin', 'edit_employee') --}}
<a class="btn btn-sm btn-secondary" href="{{ route('employee.edit', $employee->id)}}">Edit</a>
{{-- @endability
@ability('Admin', 'delete_employee') --}}
<form style="display:inline;" method="POST" action="{{ route('employee.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
