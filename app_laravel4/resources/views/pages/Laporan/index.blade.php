@extends('layouts.main')

@section('content')
    <div class="container m-4">
        <h3 class="mt-2 text-center text-primary">Data Laporan</h3>
        <hr>
        <a href="{{route('laporan.create')}}" class="btn btn-primary">+ Buat Laporan</a>
        <div class="m-3">
            <table class="table table-bordered laporan_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Operator</th>
                        <th>Summary</th>
                        <th>Info</th>
                        <th>Status</th>
                        {{-- <th width="100px">Action</th> --}}
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('add-script')
    <script>
        var table = $('.laporan_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('laporan.index') }}",
            // dom: 'Bfrtip',
            // buttons: [
            //     'copyHtml5',
            //     'excelHtml5',
            //     'csvHtml5',
            //     'pdfHtml5'
            // ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'users', name: 'users.username'},
                {data: 'summary', name: 'summary'},
                {data: 'info', name: 'info'},
                {data: 'status', name: 'status'},
            ]
        });
    </script>
@endpush