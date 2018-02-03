@extends('layout.master')
@section('content')
<div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">checkout</a>
                        </li>
                        <li>Enter Address</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>Enter Delivery Address</h1>

                        <p>Let us Know where to deliver your order</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                        
                        <form action="/submitAddress" method="post" enctype="multipart/form-data">
                    
                       {{csrf_field()}}
                        <div style="color:red"><?php if(isset($rerrorMessage)) {echo $rerrorMessage;} ?></div>
                          <div class="form-group col-md-12 col-xs-12">
                                <label for="add1">Address Line</label>
                                <input type="text" class="form-control" id="add1" name="add1" value="{{$data->add1}}" required>
                            </div>
                             <div class="form-group col-md-6 col-xs-12">
                                <label for="landmark">Landmark</label>
                                <input type="text" class="form-control" id="landmark" name="landmark" value="{{$data->landmark}}" required>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{$data->city}}" required>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="{{$data->state}}" required>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="pin">ZIP (PIN Code)</label>
                                <input type="number" class="form-control" id="pin" name="pin" value="{{$data->pin}}" required>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{$data->country}}" required>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$data->phone}}" required>
                            </div>
                           
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                


            </div>
            <!-- /.container -->
        </div>
@endsection