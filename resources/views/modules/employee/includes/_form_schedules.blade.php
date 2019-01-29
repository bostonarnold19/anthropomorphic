@php
$employee_schedule = getSchedule($employee->id);
@endphp
<form id="schedules-form" method="POST" action="{{ route('employee.update', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
    @csrf
    @method('patch')
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="schedule-selector">Schedule</label>
        <div class="col-sm-8">
            <select class="custom-select" name="schedule" id="schedule-selector" required>
                <option value="" disabled="" {{ empty($employee_schedule) ? 'selected' : '' }}>Please select</option>

                <option value="custom_schedule" data-value="{{ $employee_schedule['key'] == 'custom_schedule' ? json_encode($employee_schedule['value']) : 'null' }}" {{ $employee_schedule['key'] == 'custom_schedule' ? 'selected' : '' }}>Custom Schedule</option>
                @foreach(getAllSchedule() as $key => $value)
                <option value="{{ $key }}" data-value="{{ json_encode($value) }}" {{ $employee_schedule['key'] == $key ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    @foreach(config('hr_settings.days') as $day)
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">{{ ucfirst($day) }}</label>
        <div class="col-sm-4">
            <div class="input-group date time-picker" id="schedule-{{ $day }}-in" data-target-input="nearest">
                <input type="text" autocomplete="off" class="form-control datetimepicker-input" data-target="#schedule-{{ $day }}-in"" name="schedule[{{ $day }}][time_in]" placeholder="Time-In">
                <div class="input-group-append" data-target="#schedule-{{ $day }}-in" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group date time-picker" id="schedule-{{ $day }}-out" data-target-input="nearest">
                <input type="text" autocomplete="off" class="form-control datetimepicker-input" data-target="#schedule-{{ $day }}-out"" name="schedule[{{ $day }}][time_out]" placeholder="Time-Out">
                <div class="input-group-append" data-target="#schedule-{{ $day }}-out" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-sm btn-secondary float-right mt-3">Update</button>
</form>
