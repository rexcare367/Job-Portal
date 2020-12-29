<x-main>
  @section('title', 'Create new Job')
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
            <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Create job</li>
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
        <div class="col-12">
          <form action="{{ route('admin.jobs.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-7">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h2 class="card-title">Job Information</h2>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="title" class="col-form-label text-secondary">Job Title*</label>
                          <input type="text" name="title" id="title" class="form-control" required autofocus>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <label for="category" class="col-form-label text-secondary">Category*</label>
                        <select name="category" id="category" class="select2 form-control" required>
                          <option value="">Select Category</option>
                        </select>
                      </div>
                      <div class="col-lg-6">
                        <label for="type" class="col-form-label text-secondary">Job Type*</label>
                        <select name="type" id="type" class="select2 form-control" required>
                          <option value="">Select Job Type</option>
                          <option value="Full Time">Full Time</option>
                          <option value="Part Time">Part Time</option>
                          <option value="Contract">Contract</option>
                          <option value="Internship">Internship</option>
                          <option value="Office">Office</option>
                        </select>
                      </div>
                      <div class="col-lg-12">
                        <label for="description" class="col-form-label text-secondary">Job Description*</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- end card --}}
              </div>
              <div class="col-lg-5">
                <div class="card card-outline card-secondary">
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="deadline" class="col-form-label text-secondary">Application Deadline</label>
                      <input type="date" name="deadline" id="deadline" class="form-control" />
                    </div>
                    <div class="mb-3">
                      <label for="hiring" class="col-form-label text-secondary">Hiring Process*</label>
                      <select name="hiring" id="hiring" class="form-control">
                        <option value="">Select Hiring Process</option>
                        <option value="Face to Face">Face to Face</option>
                        <option value="Written-test">Written-test</option>
                        <option value="Telephonic">Telephonic</option>
                        <option value="Group Discussion">Group Discussion</option>
                        <option value="Walk In">Walk In</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <label for="monthly_salary_min" class="col-form-label text-secondary">Monthly Salary (Min)*</label>
                        <input type="number" name="monthly_salary_min" id="monthly_salary_min" class="form-control" min="1000" required>
                      </div>
                      <div class="col-lg-6">
                        <label for="monthly_salary_max" class="col-form-label text-secondary">Monthly Salary (Max)*</label>
                        <input type="number" name="monthly_salary_max" id="monthly_salary_max" class="form-control" min="1000" required>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="qualification" class="col-form-label text-secondary">Qualification/Eligibility*</label>
                      <select name="qualification" id="qualification" class="form-control">
                        <option value="">Select Qualification</option>
                      </select>
                    </div>
                  </div>
                </div>
                {{-- end card --}}
                
                <div class="card card-outline card-success">
                  <div class="card-header">
                    <h3 class="card-title">Action</h3>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <button type="submit" class="btn btn-success btn-block">Save</button>
                    </div>
                  </div>
                </div>
                {{-- end card --}}
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

  @push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  @endpush

  @push('js')
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script>
    $(function () {
      $('#description').summernote({
        height: 150,
        placeholder: 'Write some description...'
      });
  });
  </script>
  @endpush
</x-main>