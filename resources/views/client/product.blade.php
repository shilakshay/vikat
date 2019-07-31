@extends('client.template')

@section('body')
<div>
        <div class="productwrapper">
            <div class="productimagessmall">
                @foreach ($product->images as $item)
                <div class="productimagesmallcontainer">
                        <img src="{{$item->url}}" alt="" id="product-image-{{$loop->index+1}}">
                    </div>
                @endforeach
                {{-- <div class="productimagesmallcontainer">
                    <img src="/images/productimagesmall1.jpg" alt="" id="product-image-1">
                </div> --}}
                {{-- <div class="productimagesmallcontainer">
                    <img src="/images/productimagesmall2.jpg" alt="" id="product-image-2">
                </div>
                <div class="productimagesmallcontainer">
                    <img src="/images/productimagesmall1.jpg" alt="" id="product-image-3">
                </div>
                <div class="productimagesmallcontainer">
                    <img src="/images/productimagesmall2.jpg" alt="" id="product-image-4">
                </div> --}}
            </div>
            <div class="productimagebig">
                <img src=" {{$product->images[0]['url']}}" alt="" id="main-image">
            </div>

            <div class="productdetails">
                <h3 class="producttitle">{{$product->name}}</h3>
                <p class="mainproductcategory">{{$product->type}}</p>
                <div class="mainproductdescription" id="product-desc">{{$product['desc']}}</div>
                <p class="mainproductprice">Rs. <span class="redcolor">{{$product->price}} / 12 pieces</span></p>
    <div class="clearboth"></div>

                <div class="mainproductquantitycart">
                        <p class="mainproductquantity">Quantity :</p>
                        <input type="number" name="quantity" class="quantity" value="1" min="1" max="100">

                        <button class="mainaddtocartbutton">
                        <img src="/images/Bagwhite.png">
                        Add to Cart
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <div class="getintouch">

        <div class="getintouchcontainer">
            <h3 class="getintouchheading">Get in Touch With Us!</h3>
            <button class="contactbutton">Contact Us</button>
        </div>
    </div>

    <script>
        var main_image = document.getElementById('main-image');
        var current_url = document.getElementById('main-image').src;
        var new_url = current_url;
        console.log(current_url);
        function changeImageOnClick(){
            console.log(event.target)
            var node = event.target;
            new_url = node.src;
            main_image.src = new_url;
        };

        document.getElementById('product-image-1').addEventListener('click',changeImageOnClick);
        document.getElementById('product-image-2').addEventListener('click',changeImageOnClick);
        document.getElementById('product-image-3').addEventListener('click',changeImageOnClick);
        document.getElementById('product-image-4').addEventListener('click',changeImageOnClick);

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/9.0.1/markdown-it.min.js"></script>
    <script>
        var desc = document.getElementById('product-desc');
        var desc_text =desc.innerHTML;
        var md = window.markdownit();
        var read = md.render(desc_text);
        var new_desc = document.getElementById('product-desc');
        new_desc.innerHTML = read;
        console.log(read);
    </script>
@endsection
