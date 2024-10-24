<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my orders</title>
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
          width: 1000px;
        }
        th
        {
          background-color: rgb(31, 39, 39);
          padding: 7px;
          font-size: 17px;
          font-weight: bold;
          font-family:  'Lucida Sans';
          color: white;
        }
        td
        {
          color: rgb(59, 55, 55);
          padding: 2px;
          font-family: 'calibri';
          border: 1px solid rgb(54, 66, 36);
    
        }
        </style>

</head>
<body>
    <div class="hero_area">

<!-- end of hero area -->
   @include('home.header')

   <table class="table_deg">
                <tr>
                    <th>Product </th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>

                </tr>

               @foreach ( $my_order as $my_orders)
                    
                   <tr>

                       <td>{{$my_orders->product->title}}</td>

                       <td>{{$my_orders->product->price}}</td>

                       <td>{{$my_orders->status}}</td>

                       <td>
                        <img width="80" src="products/{{$my_orders->product->image}}">
                       </td>

                   </tr>
                @endforeach
                                   
               
            </table>


    </div>


<!-- info section -->
           @include('home.footer')
<!-- end info section -->
    
</body>
</html>