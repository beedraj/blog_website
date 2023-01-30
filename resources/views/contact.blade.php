@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <section id="contact-us">
        <h1>Get in Touch!</h1>

        @include('includes.flash-message')

        <!-- contact info -->
        <div class="container">
          <div class="contact-info">
            <div class="specific-info">
              <i class="fas fa-home"></i>
              <div>
                <p class="title">Ramgram-7,Nawalparasi,Nepal</p>
                <p class="subtitle">Moi Avenue</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-phone-alt"></i>
              <div>
                <a href="">+977 9812981911 </a>
                <br />
                <a href="">+91 9812981911</a>

                <p class="subtitle">Mon to Fri 9am-6pm</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-envelope-open-text"></i>
              <div>
                <a href="mailto:19cst128.bedrajchaudhary@giet.edu">
                  <p class="title">19cst128.bedrajchaudhary@giet.edu</p>
                </a>
                <p class="subtitle">Send us your query anytime!</p>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form">
            <form action="{{route('contact.store')}}" method="Post">
              @csrf
              <!-- Name -->
              <label for="name"><span>Name</span></label>
              <input type="text" id="name" name="name" value="" />
              @error('name')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

              <!-- Email -->
              <label for="email"><span>Email</span></label>
              <input type="text" id="email" name="email" value="" />
              @error('email')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

              <!-- Subject -->
              <label for="subject"><span>Subject</span></label>
              <input type="text" id="Subject" name="subject" value="" />
              @error('subject')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

              <!-- Message -->
              <label for="message"><span>Message</span></label>
              <textarea id="message" name="message"></textarea>
              @error('message')
                    <p style="color:red;margin-bottom:25px;">{{$message}}
                    @enderror

               <!-- Button -->
              <input type="submit" value="Submit" />
            </form>
          </div>
        </div>
      </section>
    </main>

  @endsection
  