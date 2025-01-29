<x-admin-layout>
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title">Category Table</h4>
                <p class="card-description"> Total<code>Category </code></p>
            </div>
            <div>
                <a href="{{route('admin.category.add.page')}}" class="btn btn-gradient-primary mb-2">Add</a>
            </div>
          </div>
          
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th> Image </th>
                <th> Name </th>
                <th> Slug </th>
                <th> Is_Active </th>
                <th> Created_at </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($categories as $category)
                  <tr>
                  <td class="py-1">
                      <img src="{{storage::url($category->image)}}" alt="image">
                  </td>
                  <td> {{$category->name ?? "N/A" }}</td>
                  <td> {{$category->slug ?? "N/A"}} </td>
                  <td>
                      <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  </td>
                  <td> {{$category->created_at ?? "N/A"}}</td>
                  </tr>
                  
                  @empty
                  <tr>
                  <td>No result found </td>
                  </tr>
              @endforelse
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
</x-admin-layout>


