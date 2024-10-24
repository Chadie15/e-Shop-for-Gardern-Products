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
          border: 2px solid yellowgreen;
          margin-top: 50px;
          width: 1200px;
        }
        th
        {
          background-color: skyblue;
          padding: 7px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }
        td
        {
          color: white;
          padding: 10px;
          
          border: 1px solid rgb(125, 138, 100);
        }

      .buttons{
        display: flex;
        flex-direction: column;
        padding-top: 5px;
      }
      input[type='search']{
        width: 400px;
        height: 40px;
        margin-left: 50px;
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

            <div>
              <form action="{{url('product_search')}}" method="GET">
              @csrf

                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
              </form>
            </div>
           
            <div class="div_deg ">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
            @foreach ( $product as $products )
                        
                    <tr>
                        <td>{{$products-> title}}</td>
<!-- LIMIT THE SHOWING CONTENT -->
                        <td>{!!Str::limit($products->description, 50)!!}</td>
                        <td>{{$products-> category}}</td>
                        <td>{{$products-> price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img width="100"; height="100" src="products/{{$products->image}}" alt="">
                        </td>

                        <div>

                        <td class="buttons"> 
                          <a class="btn btn-info " style="margin-top: 20px" href="{{ url('edit_product', $products->slug)}}"> Edit</a>
                          
                          <a class="btn btn-danger " style="margin-top: 20px" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}"> Delete</a> 
                        </td>
                      </div>

                    </tr> 
            @endforeach
                </table>
            </div>
<!-- Pagination  Learn on How to show few pages on the "next List"-->
                 <div class="div_deg">
                        {{$product->onEachSide(1)->links()}}
                  </div>
          </div>
      </div>
    </div>
<!-- JavaScript files-->

@include('admin.js')

  </body>
</html>