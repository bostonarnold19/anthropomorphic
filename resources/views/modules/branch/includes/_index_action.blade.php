{{-- @ability('Admin', 'edit_branch') --}}
<button type="button" data-id="{{ $branch->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_branch') --}}
<form style="display:inline;" method="POST" action="{{ route('branch.destroy', $branch->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
