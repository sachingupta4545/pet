<x-admin-layout>
<x-flash-messages/>
  <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Category</h4>
          <form class="form-sample" action="{{ route('admin.category.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="card-description">Add details of category</p>
  
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                  @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="form-group col-md-12">
                <label for="image">Images</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <div id="image-preview" class="mt-3">
                  <img id="preview-img" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;"/>
                  <div class="progress mt-2" style="display: none;">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="form-check mt-3">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="is_active" {{ old('is_active') ? 'checked' : '' }}> Is Active <i class="input-helper"></i>
              </label>
              @error('is_active')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
  
            <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </x-admin-layout>
  
  @push('scripts')
  <script>
  $(document).ready(function () {
    $('#images').on('change', function (e) {
      const file = e.target.files[0];
  
      if (file) {
        const reader = new FileReader();
  
        // Show image preview
        reader.onload = function (event) {
          $('#preview-img').attr('src', event.target.result).show();
        };
        reader.readAsDataURL(file);
  
        // Show and initialize progress bar
        const progressBarContainer = $('.progress');
        const progressBar = $('.progress-bar');
        progressBarContainer.show();
        progressBar.css('width', '0%').attr('aria-valuenow', 0).text('0%');
  
        // Simulate file upload progress
        let progress = 0;
        const interval = setInterval(function () {
          progress += 10;
          progressBar.css('width', progress + '%').attr('aria-valuenow', progress).text(progress + '%');
  
          if (progress >= 100) {
            clearInterval(interval);
            alert('File uploaded successfully!');
          }
        }, 300);
      }
    });
  });
  </script>
  @endpush