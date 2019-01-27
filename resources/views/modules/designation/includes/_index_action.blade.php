@permission('edit-designation')
<button type="button" data-id="{{ $designation->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
@endpermission
@permission('delete-designation')
<form style="display:inline;" method="POST" action="{{ route('designation.destroy', $designation->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
@endpermission
