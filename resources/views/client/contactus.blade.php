@extends('client.template')

@section('body')
<div class="contactbanner">

        <div class="aboutbannerwrapper">
            <h3 class="aboutbannerheading">Contact Us</h3>
            <p class="aboutbannerdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

    </div>

    <div class="contactformback">
       <div class="contactwrapper">
            <form action='/admin/action/message' method="POST" class="form">
                @csrf
            <div class="radiobuttons">
                <div class="radiobutton-group">
                    <input type="radio" name="type" value="enquiry" id="enquiryradio" checked>
                    <label for="enquiryradio">Send An Enquiry</label>
                </div>
                <div class="radiobutton-group">
                    <input type="radio" name="type" value="feedback" id="feedbackradio">
                    <label for="feedbackradio">Give Feedback</label>
                </div>
            </div>

            <div class="formcontainer">

                <div class="contactform">
                    <div>
                        <h5 class="contactformheading">Contact form</h5>
                        <p class="contactdescription">Have a question? Ask us! We'll get in touch.</p>
                    </div>
                        <input type="text" name="name" id="idname" placeholder="Name">
                        @error('name')<p>There was something wrong with your name.</p>@enderror
                        <input type="text" name="email" id="idemail" placeholder="Email">
                        @error('email')<p>There is some problem with your email.</p>@enderror
                        <input type="text" name="phone" id="idphone" placeholder="Phone">
                        <textarea name="message" placeholder="Message"></textarea>
                        <button class="contactsubmitbutton" type="submit">
                        <img src="/images/send.png">
                        Send
                        </button>
                    </form>


                </div>

                <div class="contactside">
                    <div>
                        <div class="iconcontainer">
                            <img src="/images/contactphone.png">
                        </div>
                        <h3>Call Us At</h3>
                        <p>+917588882550</p>
                    </div>
                    <div>
                       <div class="iconcontainer">
                        <img src="/images/contactemail.png">
                        </div>
                        <h3>Email Address</h3>
                        <p>infoadmin@vikat.com</p>
                    </div>
                    <div>
                       <div class="iconcontainer">
                        <img src="/images/contactlocation.png">
                        </div>
                        <h3>Address</h3>
                        <p>Plot No 73 and 93 lava
    Khadgaon road wadi
    Nagpur - 440023</p>
                    </div>
                </div>

           </div>

       </div>

    </div>

    <div id="map">

    </div>
    <script >
        function initMap(){
            var location ={lat:21.166  ,lng:78.980  };
            var map = new google.maps.Map(document.getElementById("map"),{
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=
    AIzaSyBDScEMW6Cb72ox4LSk9lrffjY1Lc1qIik
    &&callback=initMap">
    </script>

@endsection
