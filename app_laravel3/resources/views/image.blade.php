@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form action="" method="POST" id="form-image" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="normal">Normal</option>
                            <option value="abnormal">Abnormal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary m-2" id="save">save</button>
                </form>
            </div>
            <div class="col-lg-8">
                <h1>Data Image</h1>
                <hr>
                <div class="m-2" id="show-data"></div>
            </div>
        </div>
    </div>

    
{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
      @csrf
      <input type="text" name="image_id" id="image_id">
      <input type="hidden" name="emp_avatar" id="emp_avatar">
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="normal">Normal</option>
                    <option value="abnormal">Abnormal</option>
                </select>
            </div>
          </div>
        </div>
        <div class="my-2">
          <label for="image">Select image</label>
          <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="mt-2" id="avatar">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- edit employee modal end --}}
    
@endsection

@push('add-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetchAllEmployees();

            function fetchAllEmployees() {
                $.ajax({
                url: '{{ route("image.fetch") }}',
                method: 'get',
                success: function(response) {
                        $("#show-data").html(response);
                        $("table").DataTable({
                        order: [0, 'asc']
                        });
                    }
                });
            }

            $('#form-image').submit(function(e){
                e.preventDefault();
                let data = new FormData(this);

                $.ajax({
                    url : "{{route('image.store')}}",
                    method : "post",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                        if(data.success){
                            alert(true);
                            fetchAllEmployees();
                        }else{
                            alert(false)
                        }
                    }
                });
            });

            // edit
            $(document).on('click', '.btn-edit', function(e){
                e.preventDefault();

                let id = $(this).attr('id');

                $.ajax({
                    url: '{{route("image.edit")}}',
                    method: 'get',
                    data : {id: id,
                        _token: '{{ csrf_token() }}'},
                    success: function(response){
                        $('#image_id').val(response.id);
                        $('#status').val(response.image);
                        $("#avatar").html(
                        `<img src="storage/public/images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
                        $("#emp_avatar").val(response.image);
                    }
                });
            });

            // update employee ajax request
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_employee_btn").text('Updating...');
                $.ajax({
                url: '{{ route("image.update") }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                    fetchAllEmployees();
                    }
                }
                });
            });

            // delete employee ajax request
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    }).then((result) => {
                        if(result == true) {
                            $.ajax({
                                method: 'delete',
                                url: "{{route('image.delete')}}",
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response){
                                    swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                    });
                                    fetchAllEmployees();
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endpush