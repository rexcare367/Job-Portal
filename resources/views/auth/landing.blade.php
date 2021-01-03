<x-front>
  <section class="searchbar">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('search') }}" method="GET">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <h2>Search for your next job</h2>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-none"><div class="fas fa-search"></div></span>
                      </div>
                      <input type="text" name="term" class="form-control border-left-none" placeholder="Search by title, skill">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-none"><div class="fas fa-map-marker-alt"></div></span>
                      </div>
                      <input type="text" name="city" class="form-control border-left-none" placeholder="Search by city">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-primary btn-rounded px-4" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-front>
