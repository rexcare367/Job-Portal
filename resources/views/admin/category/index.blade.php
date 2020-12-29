<x-main>
@section('title', 'Job Categories')
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('title')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Job Categories</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <div class="card card-outline card-info">
            <div class="card-body">
              <table id="example1"
                     class="table table-bordered table-striped text-sm">
                <thead>
                <tr>
                  <th width="10%">#</th>
                  <th width="40%">Name</th>
                  <th width="30%">Created</th>
                  <th width="20%"
                      class="text-center">Action
                  </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td class="text-center">
                      <button type="button"
                              data-id="{{ $category->id }}"
                              class="open-modal btn btn-success btn-sm mr-1">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button type="button"
                              title="delete"
                              data-id="{{ $category->id }}"
                              class="delete-btn btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="pagination-container mt-2">
                {{ $categories->links() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form action="{{ route('admin.categories.store') }}"
                method="post">
            @csrf
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Create new Category</h3>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label for="name"
                         class="col-form-label text-primary">Category Name</label>
                  <input type="text"
                         name="name"
                         id="name"
                         class="form-control @error('name') is-invalid @enderror"
                         value="{{ old('name') }}"
                         required
                         autofocus/>
                  @error('name')
                  <span class="invalid-feedback"
                        role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                {{-- /name field --}}
                <div class="mb-3">
                  <label for="description"
                         class="col-form-label text-primary">Description</label>
                  <textarea name="description"
                            id="description"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                  
                  @error('description')
                  <span class="invalid-feedback"
                        role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                {{-- /description field --}}
                <div class="mb-1">
                  <button title="Save"
                          class="btn btn-success btn-sm btn-block"><i class="fa fa-save"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  
  <div class="modal fade"
       id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#"
              id="editForm"
              method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label for="name"
                     class="col-form-label text-secondary">Category Name</label>
              <input type="text"
                     name="name"
                     class="form-control"
                     required
                     autofocus/>
            </div>
            {{-- /name field --}}
            <div class="mb-3">
              <label for="description"
                     class="col-form-label text-secondary">Description</label>
              <textarea name="description"
                        class="form-control"></textarea>
            </div>
            {{-- /description field --}}
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button"
                    class="btn btn-default"
                    data-dismiss="modal">Close
            </button>
            <button id="editBtn"
                    type="submit"
                    class="btn btn-primary">Save changes
            </button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  
  <script>
      app = {
          url: {
              show: '{{ route('admin.categories.show', '') }}',
              update: '{{ route('admin.categories.update', '') }}',
              delete: '{{ route('admin.categories.destroy', '') }}',
          },
      }
  </script>
@section('jsconfig')
@endsection

@push('css')
  <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet"
          href="{{ asset('plugins/toastr/toastr.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
          href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@push('js')
  <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": [{
                    "extend": "collection",
                    "text": "Export",
                    "buttons": [
                        "copy", "csv", "excel", "pdf", "print"
                    ]
                }],
                'paging': false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('.open-modal').on('click', async function () {
                let id = $(this).data('id');
                const resp = await fetch(`${app.url.show}/${id}`);
                const data = await resp.json();
                if (data) {
                    $('#editForm').attr('action', app.url.update + `/${id}`);
                    $('#editForm input[name="name"]').val(data.name);
                    $('#editForm textarea[name="description"]').val(data.description);
                    $('#editModal').modal({
                        'keyboard': false,
                        'backdrop': false
                    })
                }
            });

            $('.delete-btn').on('click', function () {
                let id = $(this).data('id');
                let _token = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: app.url.delete + `/${id}`,
                            dataType: 'json',
                            method: 'delete',
                            data: {
                                id,
                                _token
                            }
                        }).done(function (resp) {
                            if (resp.success) {
                                Swal.fire(
                                    'Deleted!',
                                    resp.success,
                                    'success'
                                )
                            }
                        }).fail(function (xhr, status, error) {
                            alert(error);
                        });
                    }
                })
            })
        });
    </script>
    
    @if(session('success'))
      <script>
          toastr.info('{{ session('success') }}')
      </script>
    @endif
  @endpush
</x-main>