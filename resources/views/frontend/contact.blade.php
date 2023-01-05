@extends('layouts.frontend')

@section('content')

<main>
  <section class="hero-property mb-5" style="background-image: url('{{ asset('frontend/assets/images/bg1.jpg') }}'); height: 50vh;">
    <div class="container">
      <div class="row text-center" style="padding-top: 120px">
        <h3 class="text-white pt-5">Liên hệ</h3>
      </div>
    </div>
  </section>

  <section class="container" style="margin-bottom: 100px">
    <div class="row">
      @if(session()->has('message'))
        <div class="alert alert-{{ session()->get('alert-info') }} alert-dismissible fade show" role="alert">
          {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif 
      <div class="col-lg-8 mb-4">
        <div class="card p-3 border-0">
          <h3 class="mb-4">Liên lạc</h3>
          <form action="{{ route('contact.store') }}" method="post">
          @csrf
            <div class="form-group mb-3">
              <div class="row">
                <div class="col">
                  <input type="text" name="name" class="form-control bg-white border-secondary" style="height: 45px" placeholder="Họ tên" value="{{ old('name') }}"/>
                </div>
                <div class="col">
                  <input type="email" name="email" class="form-control bg-white border-secondary" style="height: 45px" placeholder="Email" value="{{ old('email') }}"/>
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <div class="row">
                <div class="col">
                  <input type="text" name="subject" class="form-control bg-white border-secondary" style="height: 45px" placeholder="Vấn đề" value="{{ old('subject') }}"/>
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <div class="row">
                <div class="col">
                  <textarea name="message" class="form-control bg-white border-secondary" rows="10" placeholder="Nội dung">
                    {{ old('message') }}
                  </textarea>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mt-3 py-3 px-4">Gửi</button>
        </form>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card border-0 p-3">
        <h3 class="mb-4">Chi tiết liên hệ</h3>
        <ul class="list-unstyled">
          <li class="d-flex align-items-center" style="column-gap: 0.8rem">
            <i class="uil uil-map-marker fs-3"></i>
            <span class="text-secondary">182 Lê Duẩn, Tp Vinh, Nghệ An</span>
          </li>

          <li class="d-flex align-items-center" style="column-gap: 0.8rem">
            <i class="uil uil-envelope-edit fs-3"></i>
            <span class="text-secondary">nhom11@gmail.com</span>
          </li>
                
          <li class="d-flex align-items-center" style="column-gap: 0.8rem">
            <i class="uil uil-phone fs-3"></i>
            <span class="text-secondary">+84 38-805-4428</span>
          </li>
        </ul>

        <span class="d-block text-secondary"><i class="uil uil-clock-two fs-3"></i> Thứ 2 – Thứ 6: 9 am – 5 pm</span>
        <span class="text-secondary"><i class="uil uil-clock-two fs-3"></i> Thứ 7: 9 am – 1pm</span>
      </div>
    </div>
  </div>
  </section>
</main>

@endsection