<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

<!-- Navbar -->
<header class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a href="#" class="navbar-brand d-flex align-items-center">
      <strong>My Gallery</strong>
    </a>
    <span class="text-white">Welcome, {{ session('user_name') }}</span>
    <form action="{{ route('logout') }}" method="POST" class="m-0">
    @csrf
    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
</form>
  </div>
</header>

<main>

  <!-- Hero Section -->
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">My Collection</h1>
        <p class="lead text-muted">Upload and manage your favorite images. Share your work with the world!</p>



        <!-- Upload Form -->
        <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center gap-2 mt-3">
            @csrf
            <input type="file" name="image" accept="image/*" class="form-control w-50" required>
            <input type="text" name="photo_title" class="form-control w-50" placeholder="Enter photo title">
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Album Section -->
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    @foreach ($photos as $photo)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <img src="{{ asset('storage/' . $photo->image_path) }}" class="bd-placeholder-img card-img-top" width="100%" height="225">

            <div class="card-body">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;" >
                <div class="btn-group">
                    <!-- View Button -->
                    <button type="button" class="btn btn-sm btn-outline-secondary" 
                        data-bs-toggle="modal" 
                        data-bs-target="#viewModal{{ $photo->id }}">
                        View
                    </button>

                    <!-- Delete Button -->
                    <form action="{{ route('photo.delete', $photo->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                        
                    </form>
                    </div>
                    <small class="text-muted">{{ $photo->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewModal{{ $photo->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $photo->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Title:{{$photo->photo_title?:'Photo View'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-fluid" alt="Image">
                </div>
            </div>
        </div>
    </div>
    @endforeach
      </div>
    </div>
  </div>

</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Toastr JS -->


<x-toastr />
</body>
</html>
