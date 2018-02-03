<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="/css/custom.css" rel="stylesheet">

    <script src="/js/respond.min.js"></script>

    <link rel="shortcut icon" href="img/favicon.png">



</head>
<script>

function searchSuggest() {
       var query= document.getElementById("searchBar").value;
       console.log("hello");
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //do something
               
               document.getElementById("searchSuggestion").innerHTML=this.responseText;
             }
        };
        xmlhttp.open("GET", "/search/"+query, true);
        xmlhttp.send();
}
function searchSubmit() {
       var query= document.getElementById("searchBar").value;
       console.log("hello");
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               //do something
               
               document.getElementById("switchContent").style.display="none";
               
               document.getElementById("hiddenContent").style.display="";
               document.getElementById("switchContentTo").innerHTML=this.responseText;
               
             }
        }; 
        xmlhttp.open("GET", "/searchSubmit/"+query, true);
        xmlhttp.send();
}


function myFilters(){
    var filters=JSON.parse('{"for":[],"type":[],"fabric":[],"fit":[],"color":[]}');
    

    $("input:checkbox[name=for]:checked").each(function() {
        filters.for.push($(this).val());
    });

    $("input:checkbox[name=type]:checked").each(function() {
        filters.type.push($(this).val());
    });

    $("input:checkbox[name=fabric]:checked").each(function() {
        filters.fabric.push($(this).val());
    });

    $("input:checkbox[name=fit]:checked").each(function() {
        filters.fit.push($(this).val());
    });

    $("input:checkbox[name=color]:checked").each(function() {
        filters.color.push($(this).val());
    });

    console.log(filters);
    var query= document.getElementById("searchBar").value;
    $.ajax({
   type: "GET",
   data: {filters:filters,query:query,_token:"<?php echo csrf_token(); ?>"},
   url: "/filterSubmit",
   success: function(msg){
     $('#switchContentTo').html(msg);
   }
});
   // $.post("myAutoLoadScript.php", { name:filters});
}

</script>
<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.html">Register</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                    <img src="/img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.html">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="">Round Neck T-shirts</a>
                                                </li>
                                                <li><a href="">V Neck T-shirts</a>
                                                </li>
                                                <li><a href="">Collared T-shirts</a>
                                                </li>
                                                <li><a href="">Plain T-shirts</a>
                                                </li>
                                                <li><a href="">Printed T-shirts</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                    <li><a href="">Round Neck T-shirts</a>
                                                    </li>
                                                    <li><a href="">V Neck T-shirts</a>
                                                    </li>
                                                    <li><a href="">Collared T-shirts</a>
                                                    </li>
                                                    <li><a href="">Plain T-shirts</a>
                                                    </li>
                                                    <li><a href="">Printed T-shirts</a>
                                                    </li>
                                            </ul>
                                        </div>
            
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Offers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="">Discount</a>
                                                </li>
                                                <li><a href="">Cashback</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                        
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Festive<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Shop</h5>
                                                <ul>
                                                    <li><a href="">Holi</a>
                                                    </li>
                                                    <li><a href="">College Fests</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                            
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <div class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" list="searchSuggestion" oninput="searchSuggest()" id="searchBar"  autocomplete="off">
                        <datalist id="searchSuggestion">
    <option value="Internet Explorer">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist>
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary" onclick="searchSubmit()"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </div>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
    <div id="switchContent">
    @yield('content')
    </div>
    <div id="hiddenContent" class="container"  style="display : none;">
    <div class="row">
    
    <div class="col-md-3">
    <div class="panel panel-default sidebar-menu hidet" id="filters">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                        <li>
                                            <a href="category.html">For<span class="badge pull-right"></span></a>
                                            <ul>
                                                <li><input  type="checkbox" name="for" value="girls">Girls</li>
                                                <li><input  type="checkbox" name="for" value="boys">Boys</li>
                                            </ul>
                                        </li>
                                        <li class="active">
                                            <a href="category.html">Type<span class="badge pull-right"></span></a>
                                            <ul>
                                                <li><input  type="checkbox" class="colour blue" style="color:blue" name="type" value="round neck">Round Neck</li>
                                                <li><input  type="checkbox" name="type" value="v neck">V Neck</li>
                                                <li><input  type="checkbox" name="type" value="polo">Polo</li>
                                                <li><input  type="checkbox" name="type" value="half sleeves">Half Sleeves</li>
                                                <li><input  type="checkbox" name="type" value="full sleeves">Full Sleeves</li>
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="category.html">Fabric<span class="badge pull-right"></span></a>
                                            <ul>
                                                <li><input id="checkBox" type="checkbox" name="fabric" value="cotton">Cotton</li>
                                                <li><input id="checkBox" type="checkbox" name="fabric" value="polyester">Polyester</li>
                                                <li><input id="checkBox" type="checkbox" name="fabric" value="metti">Metti</li>
                                            </ul>
                                        </li>
                
                                        <li>
                                            <a href="category.html">Fit<span class="badge pull-right"></span></a>
                                            <ul>
                                                <li><input id="checkBox" type="checkbox" name="fit" value="regular">Regular</li>
                                                <li><input id="checkBox" type="checkbox" name="fit" value="slim">Slim</li>
                                                <li><input id="checkBox" type="checkbox" name="fit" value="oversized">OverSized</li>
                                                <div class="checkbox checkbox-circle checkbox-black">
                                                        <input id="checkbox6a" type="checkbox">
                                                        <label>Kajuu</label>
                                                </div>
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

                        
                            <div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="color" value="white"> <span class="colour white"></span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="color" value="grey"> <span class="colour" style="background-color:#808080"></span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="color" value="black"> <span class="colour black"></span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="color" value="brown"> <span class="colour" style="background-color:#8B4513"></span>
                                                    </label>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4 col-sm-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="color" value="blue"> <span class="colour blue"></span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="color" value="violet"> <span class="colour" style="background-color:#EE82EE;"></span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="color" value="green"> <span class="colour green"></span>
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="color" value="purple"> <span class="colour" style="background-color:#4B0082;"></span>
                                                        </label>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-4 col-sm-4">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="color" value="red"> <span class="colour red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="color" value="pink"> <span class="colour" style="background-color:pink;"></span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="color" value="orange"> <span class="colour" style="background-color:orange;"></span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="color" value="yellow"> <span class="colour yellow"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                            
                                        </div>
                                    
    
                                    <button class="btn btn-default btn-sm btn-primary" onclick="myFilters()"><i class="fa fa-pencil"></i> Apply</button>
                                    </div>
                                </div>

                        </div>
                    </div>

    </div>
    <div class="col-md-9" id="switchContentTo">
    </div>
    </div>
    
    </div>
    
        <!-- *** FOOTER ***
 _________________________________________________________ -->
 <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Shirts</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
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

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->
           

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/modernizr.js"></script>
    <script src="/js/bootstrap-hover-dropdown.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/front.js"></script>






</body>

</html>