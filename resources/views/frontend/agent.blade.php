@extends('layouts.frontend')

@section('content')
<main>
  <section class="hero-property mb-5" style=" background-image: url('{{ asset('frontend/assets/images/bg-alt.jpg') }}'); height: 50vh;">
    <div class="container">
      <div class="row text-center" style="padding-top: 120px">
        <h3 class="text-white pt-5">Các nhà đầu tư</h3>
      </div>
    </div>
  </section>

  <section class="container category" style="margin-bottom: 100px">
    <h3 class="text-center">Đại lý của chúng tôi</h3>
    <p class="text-center">
      Chúng tôi có các đại lý chuyên nghiệp làm cho ngôi nhà mơ ước của bạn thoải mái
    </p>
    <hr />

    <div class="row mt-5">
      @foreach($agents as $agent)
          <div class="col-lg-4 mb-4">
            <div class="card py-5 h-100 border-0">
              <div class="mx-auto text-center">
                <img width="110" height="110" style="object-fit: cover" src="{{ Storage::url($agent->profile) }}" class="mb-3 rounded-circle d-block mx-auto border border-warning"/>
                <span class="mb-1 d-block text-secondary">Tên</span>
                <h5 class="mb-3">{{ $agent->name }}</h5>
                <hr />
                <ul class="list-unstyled mb-5">
                  <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Điện thoại : </span> {{ $agent->phone }}
                  </li>
                  <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Fax : </span> {{ $agent->fax }}
                  </li>
                  <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">WhatsApp : </span> {{ $agent->whatsapp }}
                  </li>
                  <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Email : </span> {{ $agent->email }}
                  </li>
                  <li style="column-gap: 3rem" class="text-secondary mb-3 d-flex justify-content-between">
                    <span class="fw-light">Bài đã đăng : </span> {{ $agent->properties->count() }}
                  </li>
                </ul>
              </div>
              <a href="tel:{{ $agent->phone }}" target="_blank" class="w-75 p-3 text-center mx-auto btn btn-primary">Liên hệ ngay</a>
            </div>
          </div>
        @endforeach
        </div>
      </section>
    </main>
@endsection