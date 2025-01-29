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
                  <th> Profile </th>
                  <th> First name </th>
                  <th> Progress </th>
                  <th> Email </th>
                  <th> Created_at </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($allUsers as $user)
                @if ($user->email === auth()->user()?->email)
                    @continue;
                @endif
                    <tr>
                    <td class="py-1">
                        <img src="{{asset('../../assets/images/faces-clipart/pic-1.png')}}" alt="image">
                    </td>
                    <td> {{$user->name ?? "N/A" }}</td>
                    <td>
                        <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td> {{$user->email ?? "N/A"}} </td>
                    <td> {{$user->created_at ?? "N/A"}}</td>
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