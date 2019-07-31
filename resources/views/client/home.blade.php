@extends('client.template')

@section('body')
<div class="hero">
    <img src="/images/heroimage.png" class="heroimage">

    <div class="herocontainer">
     <h2 class="heroheading">
         Vikat Mahalaxmi <br />
         <span class="subheadingcolor">Sambrani dhoop cup</span>
     </h2>
     <p class="herodescription">An influence that bring the process of leading to <br /> action & raisng the question.</p>
     <button class="buynowbutton">Buy Now</button>
     </div>
 </div>

<div class="featuredproducts">

 <div class="featuredproductscontainer">

     <div class="productheadingsection">
         <div class="productheadingline">

         </div>

         <h3 class="productheading">Featured <span class="redcolor">Products</span></h3>
         <p>Lorem Ipsum this is a small description</p>
     </div>
     <div class="products">
            @foreach ($collection as $item)
            <div class="product">
            <div class="productimagecontainer">
                    <img src="{{$item->images[0]['url']}}">
                </div>
                <hr>
                <div class="productnameprice">
                    <h3 class="productcategory">{{$item->type}}</h3>
                    <a href="/product/{{$item->id}}"><p class="productname">{{$item->name}}</p></a>
                    <p class="productprice">Rs. <span class="redcolor">{{$item->price}} / 12 pcs</span></p>
                    <div class="clearboth"></div>
                </div>
                <hr>
                <div class="productquantitycart">
                    <p class="productquantity">Quantity :</p>
                    <input type="number" name="quantity" class="quantity" value="1" min="1" max="100">
                    <button class="addtocartbutton">
                    <img src="images/Bagwhite.png">
                    Add to Cart
                    </button>
                </div>
            </div>
            @endforeach
         {{-- <div class="product">
            <div class="productimagecontainer">
                 <img src="/images/product1.png">
             </div>
             <hr>
             <div class="productnameprice">
                 <h3 class="productcategory">Incense</h3>
                 <p class="productname">Sambrani Dhoop Cup Mahalakshmi 12 Pieces</p>
                 <p class="productprice">Rs. <span class="redcolor">150</span></p>
                 <div class="clearboth"></div>
             </div>
             <hr>
             <div class="productquantitycart">
                 <p class="productquantity">Quantity :</p>
                 <input type="number" name="quantity" class="quantity" value="1" min="1" max="100">

                 <button class="addtocartbutton">
                 <img src="/images/Bagwhite.png">
                 Add to Cart
                 </button>
             </div>
         </div>
         <div class="product">
            <div class="productimagecontainer">
                 <img src="/images/product1.png">
             </div>
             <hr>
             <div class="productnameprice">
                 <h3 class="productcategory">Incense</h3>
                 <p class="productname">Sambrani Dhoop Cup Mahalakshmi 12 Pieces</p>
                 <p class="productprice">Rs. <span class="redcolor">150</span></p>
                 <div class="clearboth"></div>
             </div>
             <hr>
             <div class="productquantitycart">
                 <p class="productquantity">Quantity :</p>
                 <input type="number" name="quantity" class="quantity" value="1" min="1" max="100">

                 <button class="addtocartbutton">
                 <img src="/images/Bagwhite.png">
                 Add to Cart
                 </button>
             </div>
         </div>
         <div class="product">
            <div class="productimagecontainer">
                 <img src="/images/product1.png">
             </div>
             <hr>
             <div class="productnameprice">
                 <h3 class="productcategory">Incense</h3>
                 <p class="productname">Sambrani Dhoop Cup Mahalakshmi 12 Pieces</p>
                 <p class="productprice">Rs. <span class="redcolor">150</span></p>
                 <div class="clearboth"></div>
             </div>
             <hr>
             <div class="productquantitycart">
                 <p class="productquantity">Quantity :</p>
                 <input type="number" name="quantity" class="quantity" value="1" min="1" max="100">

                 <button class="addtocartbutton">
                 <img src="/images/Bagwhite.png">
                 Add to Cart
                 </button>
             </div> --}}
         </div>

     </div>

 </div>

</div>

<div class="aboutus">

 <div class="aboutuscontainer">
     <h3 class="aboutheading">About <span class="colorgreen">Us</span></h3>
     <p class="aboudescription">We are Vikat Industry belive in  Nature, we are leading manucafturing  quality dhoop, dhoop cup, colour dhoop cup,colour dhoop stick. The Industry is highly dedicated towards the quality maintaing process. Vikat Industry with the help of 10 strong team of marketing professionals company is covering more than 15 states in India & now planning for world wide network of distributors.</p>

     <button class="learnmorebutton">Learn More</button>
 </div>

</div>


<div class="getintouch">

 <div class="getintouchcontainer">
     <h3 class="getintouchheading">Get in Touch With Us!</h3>
     <button class="contactbutton">Contact Us</button>
 </div>

</div>
@endsection
