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

  
   <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonials
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Pieters
                  </h5>
                  <h6>
                    Customer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "I recently discovered Entebbe Gardens, and I couldn’t be happier! The quality of the vegetables is outstanding—crisp, fresh, and bursting with flavor. It’s clear that they prioritize sustainability and organic practices. The delivery was prompt, and the packaging was eco-friendly, which I really appreciate. I’ve tried several items, but the heirloom tomatoes were a standout! I love knowing that I’m supporting a local business that cares about its community. Highly recommend to anyone looking for fresh produce!"
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Rachel Sithole
                  </h5>
                  <h6>
                    Customer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "Entebbe Gardens has completely transformed my meals! The variety of greens and vegetables is impressive, and each item tastes like it was just picked from the garden. I especially love the seasonal selections—they always surprise me with something new to try. The honey is pure bliss; it’s rich and flavorful, perfect for my morning tea. Customer service is top-notch; they are always friendly and helpful. I’m thrilled to have found a reliable source for fresh, healthy food. Thank you, Entebbe Gardens!"
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Richard Pieters
                  </h5>
                  <h6>
                    Customer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "As a health-conscious individual, I am always on the lookout for high-quality produce, and Entebbe Gardens exceeded my expectations! Their commitment to organic farming shines through in every bite. I’ve been ordering their greens weekly, and each delivery feels like a little gift. The kale is particularly delicious, and the honey adds a natural sweetness to my smoothies. Plus, the convenience of doorstep delivery saves me so much time. I can’t recommend them enough to anyone wanting to eat healthier!"
              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->


  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


</body>

</html>