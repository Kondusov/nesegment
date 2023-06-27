@extends('layouts/main')
@section('content')
<section>

      <!-- Content -->
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-between gx-0 min-vh-100">
          <div class="col-12 col-md-6 py-8 py-md-11">

            <!-- Heading -->
            <h2 class="fw-bold text-center mb-2">
              Написать разработчику.
            </h2>

            <!-- Text -->
            <p class="fs-lg text-center text-muted mb-0">
              По вопросам и предложениям.
            </p>

            <!-- Divider -->
            <hr class="hr-sm my-6 my-md-8 mx-auto bg-gray-300">

            <!-- Form -->
            <form action="{{ route('main.contacts.send') }}" method="post">
            @csrf
              <div class="form-group mb-5">

                <!-- Label -->
                <label class="form-label" for="contactName">
                  Имя
                </label>

                <!-- Input -->
                <input class="form-control" name="name" type="text" placeholder="Ваше имя" required>

              </div>
              <div class="form-group mb-5">

                <!-- Label -->
                <label class="form-label" for="contactEmail">
                  Email
                </label>

                <!-- Input -->
                <input class="form-control" name="email" type="email" placeholder="hello@domain.com" required>

              </div>
              <div class="form-group mb-5">

                <!-- Label -->
                <label for="contactMessage">
                  Текст вашего обращения
                </label>

                <!-- Input -->
                <textarea class="form-control" name="message" rows="5" placeholder="Текст вашего обращения" required></textarea>

              </div>
              <div class="form-group mb-0">

                <!-- Submit -->
                <button type="submit" class="btn w-100 btn-primary lift">
                  Отправить
                </button>

              </div>
            </form>

          </div>
        </div> <!-- / .row -->
      </div>
    </section>
@endsection