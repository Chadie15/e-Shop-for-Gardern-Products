<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
      <!-- end of hero area -->
 @include('home.header')
   <!-- header end -->

  </div>

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <center>
        <h2 class=" mt-4">
          Contact Us
        </h2>
      </center>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60778.08223574007!2d31.041245999999994!3d-17.8090715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2szm!4v1729689787351!5m2!1sen!2szm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

              
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="#">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>
   

  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


</body>

</html>