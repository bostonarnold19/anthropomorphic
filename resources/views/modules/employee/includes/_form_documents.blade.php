<div class="row push">
    <div class="col-xl-12">
        <div class="block block-rounded">
            <div class="block-content block-content-full bg-xmodern ribbon ribbon-left ribbon-modern ribbon-info">
                <div class="ribbon-box text-uppercase">201 Files</div>
                <div class="py-3">
                    <form id="documents-form" method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-md-center">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="document_name" class="text-white">Document</label>
                                    <input type="text" class="form-control" id="document_name" name="document[name]" value="" placeholder="Document" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  id="document_file" name="document[file]">
                                        <label class="custom-file-label" for="document_file">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-xl-6">
                                <button type="submit" class="btn btn-sm btn-light">Upload</button>
                            </div>
                        </div>
                    </form>
                    <form id="document-download" method="GET">
                        <input type="hidden" name="link" id="document_link_download">
                    </form>
                    <form id="document-delete" method="POST" onsubmit="return confirm('Are you sure you want to delete tihs?')">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="link" id="document_link_delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@php
$documents = getDocuments($employee->id);
@endphp
@if($documents)
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
                $count = 1;
                @endphp
                @foreach($documents as $document)
                <tr>
                    <th class="text-center" scope="row">{{ $count++ }}</th>
                    <td class="font-w600">{{ $document['name'] }}</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">{{ $document['date'] }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            {{-- @ability('Admin', 'download_document') --}}
                            <form id="document-download-form" method="GET" action="{{ route('document.show', $document['id']) }}">
                                <input type="hidden" name="link" value="{{ $document['file'] }}">
                            </form>
                            <button type="submit" form="document-download-form" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Download">
                            <i class="fa fa-download"></i>
                            </button>
                            {{-- @endability
                            @ability('Admin', 'delete_document') --}}
                            <form id="document-delete-form" method="POST" action="{{ route('document.destroy', $document['id']) }}" onsubmit="return confirm('Are you sure you want to delete tihs?')">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="link" value="{{ $document['file'] }}">
                            </form>
                            <button type="submit" form="document-delete-form" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                            <i class="fa fa-times"></i>
                            </button>
                            {{-- @endability --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
