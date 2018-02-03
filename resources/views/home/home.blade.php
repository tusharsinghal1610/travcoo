@extends('layout.master')
@section('content')

           <div class="row">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="uploads/1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="uploads/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="uploads/3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="uploads/4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>




        <div id="content">

            
        <br/>

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">
            <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Trending</h2>
                        </div>
                    </div>
                </div>
               
                <div class="container">
                    <div class="">
                       

                    @foreach($products as $product)
                    <div class="col-md-3 col-sm-6">
                                <a href="/productDetails/{{$product->id}}">  
                                <div class="product same-height">
                                      <div class="flip-container">
                                          <div class="flipper">
                                              <div class="front">
                                                 
                                                      <img src="uploads/{{$product->image1}}" alt="" class="img-responsive">
                                                 
                                              </div>
                                              <div class="back">
                                                  
                                                      <img src="uploads/{{$product->image2}}" alt="" class="img-responsive">
                                                
                                              </div>
                                          </div>
                                      </div>
                                      <div class="invisible">
                                          <img src="/img/product2.jpg" alt="" class="img-responsive">
                                      </div>
                                      <br/><br/>
                                      <center>
                                          <h4>{{$product->productName}}</h4>
                                          Rs. {{$product->price}}
                                    </center>
                                  </div></a>
                                  <!-- /.product -->
                    </div>
                    @endforeach
                        
                       



                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

           

</div>






@endsection