<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use DB;

class ProductController extends Controller
{
    public function search($searchKey){
        $products = product::search($searchKey)->get();
        //$category="jkhJKH";
        /*$products = Product::search($searchKey, function ($algolia, $searchKey, $options) use ($category){
            $new_options = [];
            if (!is_null($type)) {
                $new_options = ["facetFilters"=>"category:".$category];
            }
            return Product::search($searchKey, array_merge($options,$new_options));
        });*/
        //$products=product::search($searchKey)->get();
        /*foreach($products as $product){
            echo $product->price;
        }*/
        //echo $products;
        $string ="";
        foreach($products as $product){
        $string.= '<option value="'.$searchKey.' in '.$product->productName.'">';
        }
        echo $string;
    }
    public function searchSubmit($searchKey){
        $words=explode(' ',$searchKey);
        
        $in=0;
        foreach($words as $word){
            if($word == "in")
            $in=1;
        }
        if($in==1){
            $searchKey="";
            $found=0;
            foreach($words as $word){
                if($found==1)
                $searchKey.=$word." ";
                else{
                    if($word == "in")
                    $found=1;
                }
            }
        }
        
        $products = product::search($searchKey)->get();
        $string ='<div id="content">     
        <br/><div id="hot"><div class="">
        <div class="row">';
        foreach($products as $product){
        $string.=' <div class="col-md-3 col-sm-6">
        <a href="/productDetails/'.$product->id.'">  
        <div class="product same-height">
              <div class="flip-container">
                  <div class="flipper">
                      <div class="front">
                         
                              <img src="uploads/'.$product->image1.'" alt="" class="img-responsive">
                              
                           </div>
                           <div class="back">
                               
                                   <img src="uploads/'.$product->image2.'" alt="" class="img-responsive">
                                   
                                 </div>
                             </div>
                         </div>
                         <div class="invisible">
                             <img src="/img/product2.jpg" alt="" class="img-responsive">
                         </div>
                         <br/><br/>
                         <center><h4>'.$product->productName.'</h4>
                         Rs. '.$product->price.' </center>
                         </div></a>
                         </div>';
        }
        $string.='</div></div></div></div>';
        echo $string;
    }
    public function filter(Request $request){
       $data=$request->input('filters');
       $searchKey=$request->input('query');
       if(isset($data["for"]))
       $category=$data["for"];
       if(isset($data["fit"]))
       $property3=$data["fit"];
       if(isset($data["fabric"]))
       $property2=$data["fabric"];
       if(isset($data["color"]))
       $property1=$data["color"];
       if(isset($data["type"]))
       $type=$data["type"];
       
       $words=explode(' ',$searchKey);
       
       $in=0;
       foreach($words as $word){
           if($word == "in")
           $in=1;
       }
       if($in==1){
           $searchKey="";
           $found=0;
           foreach($words as $word){
               if($found==1)
               $searchKey.=$word." ";
               else{
                   if($word == "in")
                   $found=1;
               }
           }
       }

       $products = product::search($searchKey)->get();
       if(isset($category)){
        $products = $products->map(function ($product) {
            return $product;
        })
        ->reject(function ($product) use ($category) {
            return (!in_array($product->category,$category));
        });
       }
       if(isset($type)){
        $products = $products->map(function ($product) {
            return $product;
        })
        ->reject(function ($product) use ($type) {
            return (!in_array($product->type,$type));
        });
       }
       if(isset($property1)){
        $products = $products->map(function ($product) {
            return $product;
        })
        ->reject(function ($product) use ($property1) {
            return (!in_array($product->property1,$property1));
        });
       }
       if(isset($property2)){
        $products = $products->map(function ($product) {
            return $product;
        })
        ->reject(function ($product) use ($property2) {
            return (!in_array($product->property2,$property2));
        });
       }
       if(isset($property3)){
        $products = $products->map(function ($product) {
            return $product;
        })
        ->reject(function ($product) use ($property3) {
            return (!in_array($product->property3,$property3));
        });
       }    
      
       $string ='<div id="content">     
       <br/><div id="hot"><div class="">
       <div class="row">';
       foreach($products as $product){
       $string.=' <div class="col-md-3 col-sm-6">
       <a href="/productDetails/'.$product->id.'">  
       <div class="product same-height">
             <div class="flip-container">
                 <div class="flipper">
                     <div class="front">
                        
                             <img src="uploads/'.$product->image1.'" alt="" class="img-responsive">
                             
                          </div>
                          <div class="back">
                              
                                  <img src="uploads/'.$product->image2.'" alt="" class="img-responsive">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="invisible">
                            <img src="/img/product2.jpg" alt="" class="img-responsive">
                        </div>
                        <br/><br/>
                        <center><h4>'.$product->productName.'</h4>
                        Rs. '.$product->price.' </center>
                        </div></a>
                        </div>';
       }
       $string.='</div></div></div></div>';
       echo $string;
       

    }
    public function upload(Request $request){
        
        
              
                $file1 = $request->file('image1');
                $file2 = $request->file('image2');
                $productName=$request->input('productName');
                $type=$request->input('type');
                $category=$request->input('category');
                $price=$request->input('price');
                $discount=$request->input('discount');
                $property1=$request->input('property1');
                $property2=$request->input('property2');
                $property3=$request->input('property3');
                $property4=$request->input('property4');
                $property5=$request->input('property5');
                $variant1=$request->input('variant1');
                $variant2=$request->input('variant2');
                $variant3=$request->input('variant3');
                $variant4=$request->input('variant4');
                $variant5=$request->input('variant5');
                $description=$request->input('description');
                $keywords=$request->input('keywords');
                
                   //Move Uploaded File
                   $destinationPath = 'uploads';
                   if(isset($file1)){
                   $file1name= $productName.'-1-'.$file1->getClientOriginalName(); 
                   $file1->move($destinationPath,$file1name);
                   }
                   if(isset($file2)){
                   $file2name= $productName.'-2-'.$file2->getClientOriginalName();
                       $file2->move($destinationPath,$file2name);
                    }
                    else{
                        $file2name=$file1name;
                    }
                   product::insert(
                    ['productName' => $productName, 'type' => $type, 'category'=>$category, 'price'=>$price ,'discount'=>$discount,'property1'=>$property1,'property2'=>$property2,'property3'=>$property3,'property4'=>$property4,'variant1'=>$variant1,'variant2'=>$variant2,'variant3'=>$variant3,'variant4'=>$variant4,'description'=>$description,'keywords'=>$keywords,'image1'=>$file1name,'image2'=>$file2name]
                );
                product::all()->last()->searchable();
                return view('product.uploadProduct');
             
            }
            public function isTrending(){
                $product=DB::table('Products')->where('isTrending','=','1')->get();
                return view('home.home',['products'=>$product]);
            }
            public function details(Request $request,$id){
                $product=DB::table('Products')->where('Id','=',$id)->first();
            
                $inCart=DB::table('carts')->where([['user_id','=',$request->session()->get('userId')],['product_id','=',$id]])->first();
                if(isset($inCart)){
                    $inCart=true;
                }
                
                return view('product.productDetails',['product'=>$product,'inCart'=>$inCart]);
        
        
            }
}
