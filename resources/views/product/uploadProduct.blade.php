@extends('layout.master')
@section('content')
<div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>New Product Upload</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                        
                        <form action="/uploadProduct" method="post" enctype="multipart/form-data">
                    
                       {{csrf_field()}}
                        <div style="color:red"><?php if(isset($rerrorMessage)) {echo $rerrorMessage;} ?></div>
                          <div class="form-group">
                                <label for="image1">Add Image1</label>
                                <input type="file" name="image1" id="image1">
                            </div>
                            <div class="form-group">
                                <label for="image2">Add Image2</label>
                                <input type="file" name="image2" id="image2">
                            </div>
                          <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" required>
                            </div>
                             <div class="form-group">
                                <label for="category">Category(Boys/Girls)</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="text" class="form-control" id="discount" name="discount" required>
                            </div>
                            <div class="form-group">
                                <label for="property1">Colour</label>
                                <input type="text" class="form-control" id="property1" name="property1">
                            </div>
                            <div class="form-group">
                                <label for="property2">Fabric</label>
                                <input type="text" class="form-control" id="property2" name="property2">
                            </div>
                            <div class="form-group">
                                <label for="property3">Fit</label>
                                <input type="text" class="form-control" id="property3" name="property3">
                            </div>
                            <div class="form-group">
                                <label for="property4">Wash</label>
                                <input type="text" class="form-control" id="property4" name="property4">
                            </div>
                            <div class="form-group">
                                <label for="property4">Property5</label>
                                <input type="text" class="form-control" id="property5" name="property5">
                            </div>
                            <div class="form-group">
                                <label for="variant1">S</label>
                                <input type="text" class="form-control" id="variant1" name="variant1">
                            </div>
                            <div class="form-group">
                                <label for="variant2">M</label>
                                <input type="text" class="form-control" id="variant2" name="variant2">
                            </div>
                            <div class="form-group">
                                <label for="variant3">L</label>
                                <input type="text" class="form-control" id="variant3" name="variant3">
                            </div>
                            <div class="form-group">
                                <label for="variant4">XL</label>
                                <input type="text" class="form-control" id="variant4" name="variant4">
                            </div>
                            <div class="form-group">
                                <label for="variant4">XXL</label>
                                <input type="text" class="form-control" id="variant5" name="variant5">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <textarea type="text" class="form-control" id="keywords" name="keywords" placeholder="write here just words which will be used to search your product"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                


            </div>
            <!-- /.container -->
        </div>
@endsection