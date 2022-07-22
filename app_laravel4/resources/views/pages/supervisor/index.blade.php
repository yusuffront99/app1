@extends('layouts.main')

@section('content')
    <div class="container m-4">
        <h3 class="mt-2 text-center text-primary">Data Laporan Supervisor</h3>
        <hr>
            <table class="table table-bordered laporan_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Operator</th>
                        <th>Info</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

{{-- edit employee modal start --}}


<!-- Modal -->
<div class="modal fade" id="data-laporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" id="form-supervisor">
            @csrf
            <input type="hidden" name="id" id="id">
            <input type="text" name="user_id" id="user_id">

            <div class="form-group mb-2">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="info">Laporan Shift</label>
                <textarea name="info" id="info" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="status">Pilih Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Rejected">Rejected</option>
                    <option value="Approved">Approved</option>
                    <option value="Waiting">Waiting</option>
                </select>
            </div>
        </form>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
    </div>
    </div>
</div>
</div>
{{-- edit employee modal end --}}
@endsection

@push('add-script')
    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        var table = $('.laporan_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('supervisor-index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'users', name: 'users.username'},
                {data: 'info', name: 'info'},
                {data: 'status', name: 'status'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

        // ==== checker
        $('body').on('click', '.check-data', function () {
            var laporan_id = $(this).data('id');
            $.get("{{ route('laporan.index') }}" +'/' + laporan_id +'/edit', function (data) {
            // $('#modelHeading').html("Edit Product");
            // $('#saveBtn').val("edit-user");
            $('#id').val(data.id);
            $('#user_id').val(data.user_id);
            $('#summary').val(data.summary);
            $('#info').val(data.info);
            $('#status').val(data.status);
            $('#data-laporan').modal('show');
            });
        });

        $('#btn-save').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#form-supervisor').serialize(),
            url: "{{ route('laporan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function(e){
                if(e.success){
                    alert(true)
                }
            }
        
        });
    });
    </script>
@endpush