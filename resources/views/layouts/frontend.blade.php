<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    <title>Bất động sản</title>
  </head>
  <body>
    <header class="bg-white border-bottom">
      <nav class="navbar navbar-expand-lg">
        <div class="container bg-white" style="z-index: 9">
          <div class="nav-logo d-flex align-items-center flex-column">
            <i class="uil uil-estate text-primary" style="font-size: 2rem"></i>
            <a class="navbar-brand me-0" href="{{ route('homepage') }}" style="margin-top: -0.9rem">
              Bất động sản
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"aria-controls="navbarNav"aria-expanded="false"aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Trang chủ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                <ul class="dropdown-menu">
                  @foreach($categories as $category)
                    <li>
                      <a class="dropdown-item" href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('property.index') }}">Các bài đăng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('agent.index') }}">Nhà đầu tư</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.index') }}">Liên hệ</a>
              </li>
              <a href="{{ route('register') }}" class="btn d-inline-flex justify-content-center align-items-center btn-primary mb-4 mb-md-0">
                Đăng ký 
              </a>
              <a href="{{ route('login') }}" class="btn d-inline-flex justify-content-center align-items-center btn-success mb-4 mb-md-0" style="margin-left: -20px">
                Đăng nhập
              </a>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    @yield('content')

    <footer class="bg-white mt-5 py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="nav-logo text-center d-flex align-items-center" style="width: 110px">
              <i class="uil uil-estate text-primary mb-2 d-block" style="font-size: 2rem"></i>
              <a class="navbar-brand me-0 d-block " href="{{ route('homepage') }}"style="margin-left: 5px; font-size: 1.5rem;">Bất động sản</a>
            </div>
            <p class="mt-2" style="width: 70%">
              Sự hài lòng của khách hàng chính là thành công lớn nhất của chúng tôi
              Với phương châm “Sự hài lòng của khách hàng chính là thành công lớn 
              nhất của chúng tôi” NHOM__11 luôn chú trọng đến những giá trị mà 
              mình có thể mang lại cho khách hàng. 
            </p>
          </div>
          <div class="col-lg-3">
            <h4>Links</h4>
            <ul class="list-unstyled">
              <li>Thanh toán</li>
              <li>Câu hỏi thường gặp</li>
              <li>Điều khoản & diều kiện</li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h4>Liên hệ với chúng tôi</h4>
            <ul class="list-unstyled">
              <li>
                <i class="uil uil-map-marker fs-3"></i>  
                182 Lê Duẩn, Tp Vinh, Nghệ An
              </li>
              <li>
                <i class="uil uil-envelope-edit fs-3"></i>
                nhom11@gmail.com
              </li>
              <li>
                <i class="uil uil-phone fs-3"></i>
                +84 38-805-4428
              </li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="text-center text-teal text-secondary">
          Copyright &copy; nhóm 11
        </p>
      </div>
    </footer>
    <script src=" {{  asset('frontend/assets/libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
