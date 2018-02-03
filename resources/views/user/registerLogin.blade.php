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

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                        
                        <form action="/register" method="post">
                    
                        {{ csrf_field() }}
                        <div style="color:red"><?php if(isset($rerrorMessage)) {echo $rerrorMessage;} ?></div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="rname" name="rname" value="<?php if(isset($rname)) {echo $rname;}?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="remail" name="remail" value="<?php if(isset($remail)) {echo $remail;}?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="rpassword" name="rpassword" value="<?php if(isset($rpassword)) {echo $rpassword;}?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rconfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="rconfirmPassword" name="rconfirmPassword" value="<?php if(isset($rconfirmPassword)) {echo $rconfirmPassword;}?>" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>

                        <hr>

                        <form action="/login" method="post">
                        {{ csrf_field() }}
                        <div style="color:red"><?php if(isset($lerrorMessage)) {echo $lerrorMessage;} ?></div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="lemail" name="lemail" value="<?php if(isset($lemail)) {echo $lemail;}?>" required>
                            </div>
                            <div class="form-group" name="password">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="lpassword" name="lpassword" value="<?php if(isset($lpassword)) {echo $lpassword;}?>" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        @endsection