<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default-slideright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideright" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-1">
                <form id="update-form" method="POST" action="">
                    @csrf
                    @method('patch')
                    <div class="row push">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="value[name]" placeholder="Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="time_in">Time-In</label>
                                <div class="input-group date time-picker" id="time_in" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#time_in" name="value[time_in]" placeholder="Time-In" required>
                                    <div class="input-group-append" data-target="#time_in" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="time_out">Time-Out</label>
                                <div class="input-group date time-picker" id="time_out" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#time_out" name="value[time_out]" placeholder="Time-Out" required>
                                    <div class="input-group-append" data-target="#time_out" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="days">Days</label>
                                <select class="custom-select"  id="days" name="value[days]" required>
                                    <option value="" disabled="" selected="">Please select</option>
                                    @foreach(config('hr_settings.schedule_days') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                <button type="submit" form="update-form" class="btn btn-sm btn-secondary">Update</button>
            </div>
        </div>
    </div>
</div>
