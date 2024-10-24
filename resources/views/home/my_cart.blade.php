<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
    .div_deg 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 2px;
    }
    .table_deg
    {
      text-align: center;
      margin: auto;
      border: 2px solid rgb(154, 156, 148);
      margin-top: 50px;
      width: 800px;
    }
    th
    {
      background-color: rgb(48, 100, 100);
      padding: 7px;
      font-size: 17px;
      font-weight: bold;
      font-family:  'Lucida Sans';
      color: white;
    }
    td
    {
      color: rgb(77, 39, 39);
      padding: 2px;
      border: 1px solid rgb(125, 138, 100);

    }
    .cart_text {
        text-align: center;
        padding: 20px;
        margin: 40px;
    }
    .order_deg{
      margin: 50px 40px;
      
    }
    label {
      display: inline-block;
      width: 150px;
    }
    .inputs_deg {
      padding: 10px;
    }

</style>

</head>

<body>
  <div class="hero_area">
      <!-- end of hero area -->
 @include('home.header')
   <!-- header end -->
  </div>
  <div class="div_deg">

         <table class="table_deg">
            <tr>
                <th> Product Title</th>

                <th>Price</th>

                <th>Image</th>

                <th>Remove</th>

            </tr>

            <?php

            $value = 0;

            ?>

            @foreach ($cart as $mycart )

            <tr>
                <td>{{$mycart->product->title}}</td>

                <td>{{$mycart->product->price}}</td>

                <td> <img width="70" src="/products/{{$mycart->product->image}}" alt=""> </td>

                <td> <a class="btn btn-danger" href="{{url('remove_cart',$mycart->id)}}"> Remove</a></td>

            </tr>
             <?php 
                $value = $value + floatval(str_replace('$', '', $mycart->product->price)) 
                
             ?>
                            
            @endforeach

         </table>

  </div>
  <div class="cart_text">
    <h3> The total value of the cart is : ${{$value }}</h3>
 </div>

 <div class="order_deg" style="display: flex; justify-content: center; align-items:center">

  <form action="{{url('confirm_order')}}" method="POST">
   @csrf

    <div class="inputs_deg">
      <label>Receiver Name</label>
      <input type="text" name="name" value="{{Auth::user()->name}}">
    </div>

    <div class="inputs_deg">
      <label>Receiver Address</label>
      <textarea name="address">{{Auth::user()->address}}</textarea>
    </div>
    
    <div class="inputs_deg">
      <label>Receiver Phone</label>
      <input type="phone" name="phone" value="{{Auth::user()->phone}}">
    </div>
    
    <div class="inputs_deg" style="margin-left: 30px;">
      <input  class="btn btn-primary" type="submit" value="Cash On Delivery">

      <a class="btn btn-success" href="{{url('stripe',$value)}}"> Pay Using Card</a>
    </div>
    

  </form>
</div>

  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


</body>

</html>