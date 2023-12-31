@extends('layouts.master')

@section('title', 'New Cutting')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit New Cutting</h3>
                <div class="card-options">
                    <a href="{{ route('employee.new-cutting.index') }}" class="btn text-white bg-pink"><i class="fe fe-database"></i></a>
                    <a href="#" class="card-options-fullscreen btn text-white bg-indigo" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                    <a href="javascript:void(0)" class="card-options-remove btn text-white bg-orange" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form id="editDocumentForm">
                    @csrf
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Document Number</label>
                                <input type="hidden" class="form-control" id="get_status" value="{{ $cuttingDocument->status }}">
                                <input type="hidden" class="form-control" id="get_summary_id" value="{{ $cuttingDocument->id }}">
                                <input type="text" class="form-control" id="get_document_number" value="{{ $cuttingDocument->document_number }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Document Date</label>
                                <input type="date" class="form-control" name="document_date" value="{{ $cuttingDocument->document_date }}" id="get_document_date" {{ $cuttingDocument->status != 'Running' ? 'disabled' : '' }}>
                                <span class="text-danger error-text document_date_error"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mt-1">
                                <button type="button" class="btn text-white bg-cyan" id="updateDocumentBtn">Update</button>
                                <button type="button" class="btn text-white bg-green" id="submitDocumentBtn">Submit</button>
                                <button type="button" class="btn text-white bg-green" id="updateRequestDocumentBtn">Update Request</button>
                                <span class="badge text-white bg-dark p-3" id="updateRequestText">Awaiting update request approval</span>
                                <br>
                                <br>
                                <a href="{{ route('employee.new-cutting.index') }}" class="btn text-white bg-pink">Back</a>
                                <!-- Create Btn -->
                                <button type="button" class="btn text-white bg-green" data-toggle="modal" data-target="#createModal" id="addStyleModelBtn" {{ $cuttingDocument->status != 'Running' ? 'disabled' : '' }}><i class="fe fe-plus-circle"></i></button>
                                <button type="button" class="btn text-white bg-red" id="deleteAll" {{ $cuttingDocument->status != 'Running' ? 'disabled' : '' }}><i class="fe fe-trash"></i></button>
                            </div>
                            <span><strong>Total Cutting:</strong> <span id="totalCuttingQty"></span></span>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Remarks</label>
                                <textarea name="remarks" class="form-control" rows="4" id="get_remarks" {{ $cuttingDocument->status != 'Running' ? 'disabled' : '' }}>{{ $cuttingDocument->remarks }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Create Modal -->
                <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Unique Id</label>
                                            <select class="form-control custom-select select_unique_id_js" id="search_unique_id" style="width: 100%">
                                                <option value="">Select Unique Id</option>
                                                @foreach ($allStyle as $style)
                                                <option value="{{ $style->unique_id  }}">{{ $style->unique_id  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label">Style Name</label>
                                            <select class="form-control custom-select select_style_js" id="search_style" style="width: 100%">
                                                <option value="">Select Style</option>
                                                @foreach ($allStyle as $style)
                                                <option value="{{ $style->style_id }}">{{ $style->style->style_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Unique Id</th>
                                                    <th>Buyer</th>
                                                    <th>Style</th>
                                                    <th>Season</th>
                                                    <th>Color</th>
                                                    <th>Wash</th>
                                                    <th>Day Cutting</th>
                                                    <th>Total Cutting</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="get_search_result">
                                                <!-- Content will be inserted here via AJAX -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Unique Id</label>
                            <select class="form-control custom-select filter_data select_unique_id_js" id="filter_unique_id">
                                <option value="">--All--</option>
                                @foreach ($allStyle as $style)
                                    <option value="{{ $style->unique_id }}">{{ $style->unique_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="allDataTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="allcuttingStyleChecked"></th>
                                    <th>Sl No</th>
                                    <th>Unique Id</th>
                                    <th>Order Qty</th>
                                    <th>Day Cutting</th>
                                    <th>Total Cutting</th>
                                    <th>Cutting Percentage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" id="allcuttingStyleChecked"></th>
                                    <th>Sl No</th>
                                    <th>Unique Id</th>
                                    <th>Order Qty</th>
                                    <th>Day Cutting</th>
                                    <th>Total Cutting</th>
                                    <th>Cutting Percentage</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select_unique_id_js').select2();
        $('.select_style_js').select2();

        if ($('#get_status').val() == 'Running') {
            $('#updateRequestDocumentBtn').hide();
            $('#updateRequestText').hide();
        } else if($('#get_status').val() == 'Submitted') {
            $('#updateDocumentBtn').hide();
            $('#submitDocumentBtn').hide();
            $('#updateRequestText').hide();
            $('#deleteAll').attr('disabled', true);
        }else{
            $('#updateDocumentBtn').hide();
            $('#submitDocumentBtn').hide();
            $('#updateRequestDocumentBtn').hide();
            $('#updateRequestText').show();
        }

        // Update Document
        $(document).on('click', '#updateDocumentBtn', function () {
            var id = $('#get_summary_id').val();
            var document_date = $('#get_document_date').val();
            var remarks = $('#get_remarks').val();
            var url = "{{ route('employee.new-cutting.update', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'PUT',
                data: {document_date: document_date, remarks: remarks},
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        })
                    }else{
                        $('#get_document_date').val(response.cuttindDoc.document_date);
                        $('#get_remarks').val(response.cuttindDoc.remarks);
                        $('#get_status').val(response.cuttindDoc.status);
                        $('#allDataTable').DataTable().ajax.reload();
                        toastr.success('Cutting data update successfully.');
                    }
                }
            });
        });

        // Submit Document
        $(document).on('click', '#submitDocumentBtn', function () {
            var id = $('#get_summary_id').val();
            var url = "{{ route('employee.new-cutting.submit', ":id") }}";
            url = url.replace(':id', id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You can no longer edit it!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            toastr.success('Cutting data submit successfully.');
                            $('#updateDocumentBtn').hide();
                            $('#submitDocumentBtn').hide();
                            $('#addStyleModelBtn').attr('disabled', true);
                            $('#get_document_date').attr('disabled', true);
                            $('#get_remarks').attr('disabled', true);
                            $('.deleteBtn').attr('disabled', true);
                            $('#deleteAll').attr('disabled', true);
                            $('.updateNewCuttingQty').attr('disabled', true);
                            $('#updateRequestDocumentBtn').show();
                        }
                    });
                }
            })
        });

        // Add Style Btn
        $(document).on('click', '#addStyleModelBtn', function () {
            $('#get_search_result').html('');
            $('#search_unique_id').val('').trigger('change.select2');
            $('#search_style').val('').trigger('change.select2');
        });

        // Get Style Info
        $(document).on('change', '#search_unique_id, #search_style', function() {
            $('#get_search_result').html('');
            var unique_id = $('#search_unique_id').val();
            var style_id = $('#search_style').val();
            var document_date = $('#get_document_date').val();

            $.ajax({
                url: "{{ route('employee.get.search.style.info') }}",
                type: "POST",
                data: {unique_id: unique_id, style_id: style_id, document_date: document_date},
                success: function (response) {
                    $('#get_search_result').html(response);
                },
            });
        });

        // Store Style
        $(document).on('click', '#addCutingStyleBtn', function () {
            var row = $(this).closest('tr');
            var summary_id = $('#get_summary_id').val();
            var unique_id = row.find('td:eq(0)').text();
            var daily_cutting_qty = row.find('input[name="daily_cutting_qty"]').val();
            $.ajax({
                url: "{{ route('employee.add.new-cutting.style') }}",
                type: 'POST',
                data: { summary_id: summary_id, unique_id: unique_id, daily_cutting_qty: daily_cutting_qty },
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.error, function(prefix, val){
                            row.find('span.'+prefix+'_error').text(val[0]);
                        })
                    }else{
                        if (response.status == 401) {
                            toastr.error('This style already added this document.');
                        } else {
                            $('#allDataTable').DataTable().ajax.reload();
                            toastr.success('Cutting style store successfully.');
                            $('#get_search_result').html('');
                            $('#search_unique_id').val('').trigger('change.select2');
                            $('#search_style').val('').trigger('change.select2');
                        }
                    }
                }
            });
        });

        // Update Style
        $(document).on('change', '.updateNewCuttingQty', function () {
            var row = $(this).closest('tr');
            var daily_cutting_qty = row.find('.updateNewCuttingQty').val();

            var id = $(this).data('id');
            var url = "{{ route('employee.update.new-cutting.style', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "POST",
                data: {daily_cutting_qty: daily_cutting_qty},
                success: function (response) {
                    if (response.status == 400) {
                            toastr.error('The daily cutting qty field is required.');
                    } else {
                        if (response.status == 401) {
                            toastr.error('Cutting qty is less than 1 please provide right cutting qty.');
                        } else {
                            $('#allDataTable').DataTable().ajax.reload();
                        }
                    }
                },
            });
        });

        // Get Style Data
        $('#allDataTable').DataTable({
            processing: true,
            // serverSide: true,
            searching: true,
            ajax: {
                url: "{{ route('employee.get.new-cutting.style') }}",
                data: function (e) {
                    e.summary_id = $('#get_summary_id').val();
                    e.document_date = $('#get_document_date').val();
                    e.unique_id = $('#filter_unique_id').val();
                },
            },
            columns: [
                { data: 'checkbox', name: 'checkbox' },
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'unique_id', name: 'unique_id' },
                { data: 'styleWiseTotalOrder', name: 'styleWiseTotalOrder' },
                { data: 'daily_cutting_qty', name: 'daily_cutting_qty' },
                { data: 'styleWiseTotalCuttingQty', name: 'styleWiseTotalCuttingQty' },
                { data: 'styleWiseCuttingPercentage', name: 'styleWiseCuttingPercentage' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            drawCallback: function (settings) {
                var api = this.api();
                var totalCuttingQty = api.column(3).data().reduce(function (a, b) {
                    return parseInt(a) + parseInt(b);
                }, 0);
                $('#totalCuttingQty').text(totalCuttingQty);

                var responseData = api.ajax.json();
                if (responseData && responseData.totalCuttingQty !== undefined) {
                    $('#totalCuttingQty').text(responseData.totalCuttingQty);
                }
            },
        });

        // Filter Data
        $(document).on('change', '.filter_data', function(e){
            e.preventDefault();
            $('#allDataTable').DataTable().ajax.reload();
        })

        // Delete Style
        $(document).on('click', '.deleteBtn', function(){
            var id = $(this).data('id');
            var url = "{{ route('employee.new-cutting.style.destroy', ":id") }}";
            url = url.replace(':id', id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You can bring it back though!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        success: function(response) {
                            $('#allDataTable').DataTable().ajax.reload();
                            toastr.warning('Cutting style delete successfully.');
                        }
                    });
                }
            })
        })

        // Select All Style Checkbox
        $(document).on('click', '#allcuttingStyleChecked', function(){
            $('.cuttingStyleChecked').prop('checked', $(this).prop('checked'));
        })

        // Selected Style Delete
        $(document).on('click', '#deleteAll', function (e) {
            e.preventDefault();
            var all_selected_id = [];
            $('.cuttingStyleChecked').each(function(){
                if($(this).is(":checked")){
                    all_selected_id.push($(this).val());
                }
            });
            var all_selected_id = all_selected_id.toString();
            $.ajax({
                url: "{{ route('employee.new-cutting.style.destroy.all') }}",
                type: "POST",
                data: {all_selected_id:all_selected_id},
                success: function (response) {
                    if(response.status == 400){
                        toastr.warning('Please select minimum 1 item.');
                    }else{
                        toastr.error('Style delete successfully.');
                        $('#allcuttingStyleChecked').prop('checked', false);
                        $('#allDataTable').DataTable().ajax.reload();
                    }
                },
            });
        });

        // Document Update Request
        $(document).on('click', '#updateRequestDocumentBtn', function () {
            var id = $('#get_summary_id').val();
            var url = "{{ route('employee.new-cutting.updating.request', ":id") }}";
            url = url.replace(':id', id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You can edit it!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            $('#updateRequestDocumentBtn').hide();
                            $('#updateRequestText').show();
                            toastr.success('Cutting data update request successfully.');
                        }
                    });
                }
            })
        });

    });
</script>
@endsection
