<form method="POST" action="{{ route('employee.update', $employee->id) }}">
    @csrf
    @method('patch')
    <div class="row push">
        <div class="col-xl-4">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" placeholder="First Name" required>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" placeholder="First Name" required>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $employee->middle_name }}" placeholder="Middle Name">
            </div>
        </div>
    </div>
    <div class="row push">
        <div class="col-xl-12">
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" minlength="10" id="address" name="address" rows="4" placeholder="Address" required>{{ $employee->address }}</textarea>
            </div>
        </div>
    </div>
    <div class="row push">
        <div class="col-xl-6">
            <div class="form-group">
                <label class="d-block">Gender</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="gender-male" name="gender" value="male" {{ $employee->gender == 'male' ? 'checked' : '' }} required>
                    <label class="custom-control-label" for="gender-male">Male</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="gender-female" name="gender" value="female" {{ $employee->gender == 'female' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="gender-female">Female</label>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="text" class="js-datepicker form-control" id="birthdate" name="birthdate" value="{{ $employee->birthdate }}" placeholder="Birthdate" required>
            </div>
        </div>
    </div>
    <div class="row push">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="first_name">Mobile Number</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $employee->mobile }}" placeholder="Mobile Number">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="telephone">Telephone Number</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $employee->telephone }}" placeholder="Telephone Number">
            </div>
        </div>
    </div>
    <div class="row push">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="marital_status">Marital Status</label>
                <select class="custom-select" name="marital_status" required>
                    <option value="" disabled="" {{ empty($employee->marital_status) ? 'selected' : '' }}>Please select</option>
                    @foreach(config('hr_settings.marital_status') as $value)
                    <option value="{{ $value }}" {{ $employee->marital_status == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="educational_level">Educational Level</label>
                <select class="custom-select" name="educational_level" required>
                    <option value="" disabled="" {{ empty($employee->marital_status) ? 'selected' : '' }}>Please select</option>
                    @foreach(config('hr_settings.educational_level') as $value)
                    <option value="{{ $value }}" {{ $employee->educational_level == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-secondary">Update</button>
</form>
