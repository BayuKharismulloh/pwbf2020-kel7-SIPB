<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/fontawesome/all.css') }}">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container py-3">
          <a class="navbar-brand" href="#">Samsan<span class="text-primary">Tech</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="ms-auto collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link mx-4 active" aria-current="page" href="/">Home</a>
              <a href="/home" class="btn btn-primary text-bold">Get In Touch</a>
            </div>
          </div>
        </div>
      </nav>
    <!-- end of navbar -->

    <!-- main section -->
      <div class="container mt-3">
          <section class="main d-flex align-items-center justify-content-between">
              <div class="col">
                <h4 class="text-primary">
                    <i class="fas fa-sun"></i> <span class="ms-2">Jump start your growth</span>
                </h4>
                <h1 class="title mt-5">
                    We boost the growth for <span class="text-primary">Startup</span> to fortune 500 companies
                </h1>
                <h5 class="text-secondary mt-5">
                    Get the most accurate leads, sales people training and conversions, <br>tools and more.
                </h5>
                <a href="/home" class="btn btn-primary mt-5">
                Get In Touch</a>
              </div>
              <div>
                  <img src="{{ asset('frontend/img/main.jpg') }}" alt="" class="rounded" width="500">
              </div>
          </section>
      </div>
    <!-- end of main section -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/fontawesome/all.js') }}"></script>
</body>
</html>