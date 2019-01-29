<form id="employment-details-form" method="POST" action="{{ route('employee.update', $employee->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-xl-4">
            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $employee->employee_id }}" placeholder="Employee ID" required>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="rfid">RFID</label>
                <input type="text" class="form-control" id="rfid" name="rfid" value="{{ $employee->rfid }}" placeholder="RFID" required>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ getSalary($employee->id) }}" placeholder="Salary" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="form-group">
                <label for="branch">Branch</label>
                <select class="custom-select" name="branch" id="branch" required>
                    <option value="" disabled="" {{ empty(getBranch($employee->id)) ? 'selected' : '' }}>Please select</option>
                    @foreach(getAllBranch() as $key => $value)
                    <option value="{{ $key }}" {{ getBranch($employee->id) == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="department">Department</label>
                <select class="custom-select" name="department" id="department" required>
                    <option value="" disabled="" {{ empty(getDepartment($employee->id)) ? 'selected' : '' }}>Please select</option>
                    @foreach(getAllDepartment() as $key => $value)
                    <option value="{{ $key }}" {{ getDepartment($employee->id) == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="form-group">
                <label for="designation">Designation</label>
                <select class="custom-select" name="designation" id="designation" required>
                    <option value="" disabled="" {{ empty(getDesignation($employee->id)) ? 'selected' : '' }}>Please select</option>
                    @foreach(getAllDesignation() as $key => $value)
                    <option value="{{ $key }}" {{ getDesignation($employee->id) == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="is_hired">Hired</label>
                <select class="custom-select" name="is_hired" id="is_hired" required>
                    <option value="0" {{ empty($employee->date_hired) ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $employee->date_hired ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="date_hired">Date Hired</label>
                <input type="text" autocomplete="off" class="js-datepicker form-control" id="date_hired" {{ empty($employee->date_hired) ? 'disabled' : '' }} name="date_hired" value="{{ $employee->date_hired }}" placeholder="Date Hired" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="is_regular">Regular</label>
                <select class="custom-select" name="is_regular" id="is_regular" required>
                    <option value="0" {{ empty($employee->date_regular) ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $employee->date_regular ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="date_regular">Date Regular</label>
                <input type="text" autocomplete="off" class="js-datepicker form-control" id="date_regular" {{ empty($employee->date_regular) ? 'disabled' : '' }} name="date_regular" value="{{ $employee->date_regular }}" placeholder="Date Hired" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <label for="is_retirement">Retirement</label>
                <select class="custom-select" name="is_retirement" id="is_retirement" required>
                    <option value="0" {{ empty($employee->date_retirement) ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $employee->date_retirement ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label for="date_retirement">Date Retirement</label>
                <input type="text" autocomplete="off" class="js-datepicker form-control" id="date_retirement" {{ empty($employee->date_retirement) ? 'disabled' : '' }} name="date_retirement" value="{{ $employee->date_retirement }}" placeholder="Date Hired" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-secondary">Update</button>
</form>
