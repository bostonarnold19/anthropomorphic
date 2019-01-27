{{-- @ability('Admin', 'edit_section') --}}
<button type="button" data-id="{{ $section->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_section') --}}
<form style="display:inline;" method="POST" action="{{ route('section.destroy', $section->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
