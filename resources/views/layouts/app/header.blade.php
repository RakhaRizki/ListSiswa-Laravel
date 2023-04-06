<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <i class="fa-solid fa-dragon fs-5 me-3"> List Siswa </i>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <!-- <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li> -->
        </ul>

        <!-- Tombol Login / Register -->
        @if(!Auth::check())
        <a href= " {{ url("login") }} " class="btn btn-outline-light me-2"> Log-In </a>
        <a href= " {{ url("register") }} " class="btn btn-outline-light me-2"> Register </a>
        @else()

        <!-- Menambahkan Profile -->
        <!-- <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..."
            class="img-fluid me-2" style="max-width: 3%; height: auto;border-radius: 50%;"> -->

        <!-- Log Out -->
        <!-- {{ Auth::user()->name }} menampilkan nama pengguna yang saat ini login di Web -->
        <a href= " # " class="btn btn-success me-2"> {{ Auth::user()->name }} </a>
        <a href= " {{ url("logout") }} " class="btn btn-outline-light me-2"> Log-Out </a>
        @endif

        </div>
      </div>
    </div>
  </header>