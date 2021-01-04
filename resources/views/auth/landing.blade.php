<x-front>
  @section('jsconfig')
  <script>
    window.app = {
      url: {
        titleSkillSearch: "{{ route('jobskill.search')}}",
        jobCitySearch: "{{ route('jobcity.search')}}",
        search: "{{ route('search')}}",
      }
    }

    function submitForm() {
      let route = window.app.url;

      let link = route.search + '?' + searchData;
      window.location.href = link;
    }
  </script>
  @endsection

  @push('js')
  <script>
    $(document).ready(function () {
        $('#searchForm').on('submit', function (evt) {
          alert('submit form called');
          evt.preventDefault();
          return false;
        });

        $('#searchBtn').on('click', submitForm);
      });
  </script>
  @endpush

  <section class="searchbar">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div id="searchForm" action="{{ route('search') }}" method="GET">
            <div class="card card-outline card-primary">
              <div class="text-center card-header">
                <h2>Search for your next job</h2>
              </div>
              <div class="card-body bg-light-sky">
                <div class="row">
                  <div class="col-md-5">
                    <title-skill-search></title-skill-search>
                  </div>
                  <div class="col-md-5">
                    <job-city-search></job-city-search>
                  </div>
                  <div class="col-md-2">
                    <button id="searchBtn" class="px-4 btn btn-primary btn-rounded" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="job-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h4 class="card-title">All Jobs</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @forelse($jobs->chunk(4) as $chunk)
                    <div class="row">
                      @foreach ($chunk as $job)
                        <div class="col-md-3 col-12">
                          <a class="job-link" href="{{ route('job.view', $job->slug) }}">
                            <div class="jobs card">
                              <div class="card-body">
                                <p>{{ Illuminate\Support\Str::limit($job->title, 30) }}</p>
                                <p class="text-sm text-muted">{{ $job->company_name }} <strong>{{ $job->city->name }}</strong></p>
                                <p class="my-0"><strong>Category</strong>: {{ $job->category->name }}</p>
                                <p class="my-0"> {{ renderJobType($job->type) }} </p>
                                <p class=""><strong>Salary</strong>: {{ "Rs. " . thousandsCurrencyFormat($job->monthly_salary_min) . " - " .
                                thousandsCurrencyFormat($job->monthly_salary_max)  }}</p>
                                <p><strong>Posted </strong> {{ $job->created_at->diffForHumans() }}</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      @endforeach
                    </div>
                  @empty
                    <div class="col-12">
                      <h3>No Jobs were found</h3>
                    </div>
                  @endforelse
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="pagination-wrap">
                {{ $jobs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-front>
