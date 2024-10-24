<!DOCTYPE html>
<html>

  <head> 

    @include('admin.css')

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
          margin-top: 30px;
          width: 1100px;
        }
        th
        {
          background-color: rgb(31, 39, 39);
          padding: 7px;
          font-size: 14px;
          font-weight: bold;
          font-family:  'Lucida Sans';
          color: white;
        }
        td
        {
          color: darkgray;
          padding: 2px;
          font-family: 'calibri';
          font-size: 12px;
          border: 1px solid rgb(54, 66, 36);
    
        }
        .cart_text {
            text-align: center;
            padding: 20px;
            margin: 60px;
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

 @include('admin.header')

@include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h3>All Orders</h3>
            <div class="div_deg">

            <table class="table_deg">
                <tr>
                    <th>Client Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                     <th>Update Status</th>
                     <th>Print Pdf</th>
                </tr>

                    @foreach ( $order as $orders)
                    
                <tr>

                    <td>{{$orders->name}}</td>
                    <td>{{$orders->rec_address}}</td>
                    <td>{{$orders->phone}}</td>
                    <td>{{$orders->user->name}}</td>
                    <td>{{$orders->product->price}}</td>
                    <td>
                        <img width="70" src="/products/{{$orders->product->image}}">
                    </td>

                    <td>{{$orders->payment_status}}</td>

                    <td>
                      @if ($orders->status == 'in progress')

                      <span style="color: red;  font-weight:bold "> {{$orders->status}}</span>
                         
                      @elseif($orders->status == 'On The Way')

                      <span style="color: skyblue) ; font-weight:bold"> {{$orders->status}}</span>
  
                      @else

                      <span style="color: rgb(87, 160, 87); font-weight:bold";> {{$orders->status}}</span>
                     
                      @endif

                    </td>

                    <td>
                      <a type="submit" class="btn btn-secondary" href="{{url('on_the_way', $orders->id)}}">On the Way</a>

                      <a type="submit" class="btn btn-success" href="{{url('delivered', $orders->id)}}">Delivered</a>

                    </td>

                    <td> 
                      <a class="btn btn-secondary" href="{{url('print_pdf', $orders->id)}}">Print</a>
                    </td>
                </tr>
                                   
               @endforeach
            </table>

            </div>
            
          </div>

      </div>

    </div>
    <!-- JavaScript files-->
    
    @include('admin.js')

  </body>
</html>