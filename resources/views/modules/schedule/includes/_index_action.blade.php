{{-- @ability('Admin', 'edit_schedule') --}}
<button type="button" data-id="{{ $schedule->id }}" id="btn-edit" class="btn btn-sm btn-secondary">Edit</button>
{{-- @endability
@ability('Admin', 'delete_schedule') --}}
<form style="display:inline;" method="POST" action="{{ route('schedule.destroy', $schedule->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
</form>
{{-- @endability --}}
