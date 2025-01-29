<x-admin-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
              <div>
                  <h4 class="card-title">product Table</h4>
                  <p class="card-description"> Total<code>product </code></p>
              </div>
              <div>
                  <a href="{{ route('admin.product.create') }}"  class="btn btn-gradient-primary mb-2">Add</a>
              </div>
            </div>
            
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> product </th>
                  <th> Brand </th>
                  <th> Price </th>
                  <th> is_featured </th>
                  <th> on_sale </th>
                  <th> in_stock </th>
                  <th> is_active </th>
                </tr>
              </thead>
              <tbody>
                @if(isset($products))
                    
                    @forelse ($products as $product)
                    <tr>
                        <td class="py-1">
                            <img src="{{storage::url($product->image)}}" alt="image">
                        </td>
                        <td> {{$product->name ?? "N/A" }}</td>
                        <td> {{$product->slug ?? "N/A"}} </td>
                        <td>
                            <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td> {{$product->created_at ?? "N/A"}}</td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td>No result found </td>
                    </tr>
                    @endforelse
                    @else
                    <tr>
                        <td>No result found </td>
                    </tr>
                @endif
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </x-admin-layout>
  
  
  