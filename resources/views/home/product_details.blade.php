<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
  #div_center{
    display: flex !important;
    align-content:center !important;
    align-items: center !important;
    padding: 30px;
    margin-left: 30%
  }
  .detail-box{
    padding: 5px;
    
  }
  .desc{
       font-size: 13px;
       color: rgb(139, 96, 96);
  }


  </style>
</head>

<body>
  <div class="hero_area">
<!-- end of hero area -->
 @include('home.header')
<!-- header end -->

  </div>

<!-- start of product details -->

    <section class="shop_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Latest Products
            </h2>
          </div>
    
          <div class="row">

            <div class=" col-md-10">
              <div class="box">
    
                  <div id="div_center">
                    <img width="300" src="/products/{{$product_data->image}}" alt="">
                  </div>
                  <div class="detail-box">
                    <h6> {{ $product_data->title}} </h6>
                    <h6>
                      Price
                      <span>
                        {{$product_data->price}}
                      </span>
                    </h6>
                  </div>

                  <div class="detail-box">
                    <h6> {{ $product_data->category}} </h6>
                    <h6>
                      Available Quantity
                      <span>
                        {{$product_data->quantity}}
                      </span>
                    </h6>
                  </div>

                  <div class="detail-box desc">

                        <p> {{$product_data->description}}</p>
                  </div>

              </div>
            </div>
    
         </div>
        </div>
      </section>
    

  <!-- end of product details -->
   

  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


</body>

</html>