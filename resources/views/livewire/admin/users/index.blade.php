<x-admin-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users Table</h4>
            <p class="card-description"> Total User<code> or wants to add new one</code>
            </p>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th> User </th>
                  <th> First name </th>
                  <th> Progress </th>
                  <th> Amount </th>
                  <th> Deadline </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($collection as $item)
                    <tr>
                    <td class="py-1">
                        <img src="{{asset('../../assets/images/faces-clipart/pic-1.png')}}" alt="image">
                    </td>
                    <td> {{Herman Beck }}</td>
                    <td>
                        <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td> $ 77.99 </td>
                    <td> May 15, 2015 </td>
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