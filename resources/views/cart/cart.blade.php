@extends('layout.master')
@section('content')
<script>
function deletion(ele) {
        var id=ele.className;
       document.getElementsByClassName(id)[3].innerHTML="deleting...";
       
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //do something
               document.getElementsByClassName(id)[0].innerHTML="";
              
               document.getElementById('totalPrice').innerHTML=this.responseText;
               document.getElementById('subTotal').innerHTML=this.responseText;
             }
        };
        xmlhttp.open("GET", "deleteFromCart?productId="+id, true);
        xmlhttp.send();
}
function changeQuantity(ele){
    var id=ele.className;
    var quantity=document.getElementsByClassName(id)[1].value;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //do something
              
              var result=JSON.parse(this.response);
              console.log(result[0]);
               document.getElementById('totalPrice').innerHTML=result[0];
               document.getElementById('subTotal').innerHTML=result[0];
               document.getElementsByClassName(id)[2].innerHTML=result[1];

             }
        };
        xmlhttp.open("GET", "changeQuantity?productId="+id+"&quantity="+quantity, true);
        xmlhttp.send();
}
</script>
<div id="all">
<div id="content">
<div class="container">
<div class="col-md-9" id="basket">
   <div class="box">
      <form method="post" action="checkout1.html">
         <h1>Shopping cart</h1>
         <p class="text-muted">You currently have 3 item(s) in your cart.</p>
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th colspan="2">Product</th>
                     <th>Quantity</th>
                     <th>Unit price</th>
                     <th>Discount</th>
                     <th>Total</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $totalprice=0;?>
                     @foreach ($cartProducts as $cartProduct) 
                      <?php $product=$cartProduct->product;   
                      $price=(int)$product->price;
                      $discount=(int)$product->discount;
                      $quantity=(int)$cartProduct->quantity;
                      $total=($price-$discount) * $quantity;
                      $totalprice=$totalprice+$total?>
                     <tr class="{{$product->id}}">
                          <td>
                              <a href="#">
                                  <img src="uploads/{{$product->image1}}" alt="{{$product->productName}}">
                              </a>
                          </td>
                          <td><a href="/productDetails/{{$product->id}}">{{$product->productName}}</a>
                          </td>
                          <td>
                              <input type="number" value="{{$cartProduct->quantity}}" class="{{$product->id}}" onchange="changeQuantity(this)">
                          </td>
                          <td>Rs. {{$price}}</td>
                          <td>Rs. {{$discount}}</td>
                          <td class="{{$product->id}}">Rs. {{$total}}</td>
                          <td><a class="{{$product->id}}" onclick="deletion(this)"><i class="fa fa-trash-o"></i></a>
                          </td>
                      </tr> 
                      @endforeach
                      
               </tbody>
               <tfoot>
                  <tr>
                     <th colspan="5">Total</th>
                     <th colspan="2">Rs. <span id="totalPrice"><?php echo $totalprice?></span></th>
                  </tr>
               </tfoot>
            </table>
         </div>
         <!-- /.table-responsive -->
         <div class="box-footer">
            <div class="pull-left">
               <a href="/cart" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
            </div>
            <div class="pull-right">
               <a href="/cart" class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</a>
               <a href="/checkout1" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
               </a>
            </div>
         </div>
      </form>
   </div>
   <!-- /.box -->
   <div class="row same-height-row">
      <div class="col-md-3 col-sm-6">
         <div class="box same-height">
            <h3>You may also like these products</h3>
         </div>
      </div>
      <div class="col-md-3 col-sm-6">
         <div class="product same-height">
            <div class="flip-container">
               <div class="flipper">
                  <div class="front">
                     <a href="detail.html">
                     <img src="img/product2.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
                  <div class="back">
                     <a href="detail.html">
                     <img src="img/product2_2.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
               </div>
            </div>
            <a href="detail.html" class="invisible">
            <img src="img/product2.jpg" alt="" class="img-responsive">
            </a>
            <div class="text">
               <h3>Fur coat</h3>
               <p class="price">$143</p>
            </div>
         </div>
         <!-- /.product -->
      </div>
      <div class="col-md-3 col-sm-6">
         <div class="product same-height">
            <div class="flip-container">
               <div class="flipper">
                  <div class="front">
                     <a href="detail.html">
                     <img src="img/product1.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
                  <div class="back">
                     <a href="detail.html">
                     <img src="img/product1_2.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
               </div>
            </div>
            <a href="detail.html" class="invisible">
            <img src="img/product1.jpg" alt="" class="img-responsive">
            </a>
            <div class="text">
               <h3>Fur coat</h3>
               <p class="price">$143</p>
            </div>
         </div>
         <!-- /.product -->
      </div>
      <div class="col-md-3 col-sm-6">
         <div class="product same-height">
            <div class="flip-container">
               <div class="flipper">
                  <div class="front">
                     <a href="detail.html">
                     <img src="img/product3.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
                  <div class="back">
                     <a href="detail.html">
                     <img src="img/product3_2.jpg" alt="" class="img-responsive">
                     </a>
                  </div>
               </div>
            </div>
            <a href="detail.html" class="invisible">
            <img src="img/product3.jpg" alt="" class="img-responsive">
            </a>
            <div class="text">
               <h3>Fur coat</h3>
               <p class="price">$143</p>
            </div>
         </div>
         <!-- /.product -->
      </div>
   </div>
</div>
<!-- /.col-md-9 -->
<div class="col-md-3">
   <div class="box" id="order-summary">
      <div class="box-header">
         <h3>Order summary</h3>
      </div>
      <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
      <div class="table-responsive">
         <table class="table">
            <tbody>
               <tr>
                  <td>Order subtotal</td>
                  <th>Rs. <span id="subTotal"><?php echo $totalprice?></span></th>
               </tr>
               <tr>
                  <td>Shipping and handling</td>
                  <th>$10.00</th>
               </tr>
               <tr>
                  <td>Tax</td>
                  <th>$0.00</th>
               </tr>
               <tr class="total">
                  <td>Total</td>
                  <th>$456.00</th>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <div class="box">
      <div class="box-header">
         <h4>Coupon code</h4>
      </div>
      <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
      <form>
         <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
            <button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>
            </span>
         </div>
         <!-- /input-group -->
      </form>
   </div>
</div>
<!-- /.col-md-3 -->
</div>
</div>
</div>
@endsection