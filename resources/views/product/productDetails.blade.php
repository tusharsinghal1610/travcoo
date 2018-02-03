@extends('layout.master')
@section('content')

<script>
function sendToCart() {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //do something
               if(this.responseText == '1'){
               document.getElementById('addToCart').style.display='none';
               document.getElementById('goToCart').style.display='';
               }
               else{
                window.location="/register";
               }

            }
        };
        xmlhttp.open("GET", "sendToCart?productId=<?php echo $product->id; ?>", true);
        xmlhttp.send();
    
}
   
</script>
<div id="all">
	

        <div id="content">
            <div class="container">
                

                <div class="col-md-9" id="mainContent" >

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                               <?php if (isset($product->image1)) echo '<img src="/uploads/'.$product->image1.'" alt="" class="img-responsive">';?>
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $product->productName; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price">Rs. <?php echo $product->price; ?></p>

                                <p class="text-center buttons">
                                
                                    
                                
                                    <a class="btn btn-primary" href="/cart" id="goToCart"><i class="fa fa-shopping-cart"></i> Go to cart</a>
                                    
                                    <a class="btn btn-primary" onclick="sendToCart()" id="addToCart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                
                                </p>


                            </div>


                        </div>
                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p><?php echo $product->description; ?></p>
                            <h4>Material & care</h4>
                            <ul>
                                <?php if(isset($product->property1)) echo '<li>'.$product->property1.'</li>';
                                      if(isset($product->property2)) echo '<li>'.$product->property2.'</li>';
                                      if(isset($product->property3)) echo '<li>'.$product->property3.'</li>';
                                      if(isset($product->property4)) echo '<li>'.$product->property4.'</li>';
                                       ?>
                                
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                            <?php if(isset($product->property1)) echo '<li>'.$product->property1.'</li>';
                                      if(isset($product->property2)) echo '<li>'.$product->property2.'</li>';
                                      if(isset($product->property3)) echo '<li>'.$product->property3.'</li>';
                                      if(isset($product->property4)) echo '<li>'.$product->property4.'</li>';
                                       ?>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>
             </div>
             <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu hidet" id="filters">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="category.html">Men <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Shirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="category.html">Ladies  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Skirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">Kids  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="category.html">T-shirts</a>
                                        </li>
                                        <li><a href="category.html">Skirts</a>
                                        </li>
                                        <li><a href="category.html">Pants</a>
                                        </li>
                                        <li><a href="category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>

                    
                    <div class="panel panel-default sidebar-menu hidet" id="sorts">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                </div>
         </div>
      </div>
  </div>
  <script>
  @if(isset($inCart))
document.getElementById('addToCart').style.display='none';
@else
document.getElementById('goToCart').style.display='none';
@endif
</script>
@endsection