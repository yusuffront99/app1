@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center text-primary">Buat Laporan</h3>
        <hr>
        <div class="col-lg-6 col-md-6 m-auto">
            <form action="" id="form-laporan">
                @csrf
                <div class="form-group">
                    <label for="user_id">Nama Operator</label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option value="{{Auth()->user()->id}}" selected>{{Auth()->user()->username}}</option>
                    </select>
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input type="text" name="summary" id="summary" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="info">Info Laporan Shift</label>
                        <textarea name="info" id="info" cols="20" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <label for="info">Info Lapo</label> --}}
                        <select name="status" id="status" class="form-select" hidden>
                            <option value="Waiting">Waiting</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <button class="btn btn-primary" type="submit" id="btn-laporan">simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('add-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-laporan').click(function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{route("laporan.store")}}',
                    method: 'POST',
                    data: $('#form-laporan').serialize(),
                    dataType: 'JSON',
                    success: function(data){
                        if(data.success){
                            alert(true);
                        }
                    }
                });
            });
        });
    </script>
@endpush