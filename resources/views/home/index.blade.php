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
 @include('home.slider')
   <!--slider end  -->
  </div>

  <!-- shop section -->

@include('home.product')
  <!-- end shop section -->
   

  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


</body>

</html>