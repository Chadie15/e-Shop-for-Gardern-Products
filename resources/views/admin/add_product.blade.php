<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .dev_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }
       h1{
        color: white;
       }
       label{
        display: inline-block;
        width: 200px;
        font-size: 15px !important;
        color: white !important;
       }
       input[type='text']{
        width: 350px;
        height: 50px;

       }
       textarea{
        height: 80px;
        width: 350px; class"input_deg"
       }
       .input_deg{
        padding: 15px;
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

            <div class="dev_deg">
                <form action="upload_product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>Add Product</h1>
                    <div class="input_deg">
                       <label> Product Title </label>
                       <input type="text" name="title" required>
                    </div>
                    <div class="input_deg">
                        <label> Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="input_deg">
                        <label> Price</label>
                        <input type="text" name="price" placeholder="ZW$">
                    </div>
                    <div class="input_deg">
                        <label> Quantity</label>
                        <input type="number" name="quantity">
                    </div>

                    <div class="input_deg">
                        <label> Product Category</label>
            <select name="category" required>
                <option> Select a Category </option>

                   @foreach ( $category as $category )
                      <option value="{{ $category->category_name}}"> {{ $category->category_name}}</option>
                   @endforeach
            </select>
                    </div>

                    <div class="input_deg">
                        <label> Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input_deg">
                        <input class="btn btn-primary" type="submit" value="Add product">
                    </div>
                </form>
            </div>

            
          </div>
      </div>
    </div>
    <!-- JavaScript files-->

 @include('admin.js')
 
  </body>
</html>