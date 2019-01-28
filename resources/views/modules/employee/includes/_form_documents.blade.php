<div class="row push">
    <div class="col-xl-12">
        <form id="documents-form" method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row justify-content-md-center">
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="document_name">Document</label>
                        <input type="text" class="form-control" id="document_name" name="document[name]" value="" placeholder="Document" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xl-6">
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="document_file" name="document[file]">
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xl-6">
                    <button type="submit" class="btn btn-sm btn-secondary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <table class="table table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Date</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count = 0;
                @endphp
                @foreach(getDocuments($employee->id) as $document)
                <tr>
                    <th class="text-center" scope="row">{{ $count++ }}</th>
                    <td class="font-w600">{{ $document['name'] }}</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">{{ $document['date'] }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Download">
                            <i class="fa fa-download"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                            <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
