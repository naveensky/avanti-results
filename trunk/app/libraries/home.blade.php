<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

    <title>ADR India - Mera Vote, Mera Desh </title>
    <meta name="fragment" content="!"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <style type="text/css">
        .progress {
            position: relative;
            width: 400px;
            border: 1px solid #ddd;
            padding: 1px;
            border-radius: 3px;
        }

        .bar {
            background-color: #B4F5B4;
            width: 0%;
            height: 20px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            top: 3px;
            left: 48%;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/jquery.qtip.css') %>"/>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/jquery-ui/jquery-ui.css') %>"/>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/supersized/supersized.css') %>"/>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/supersized/supersized.shutter.css') %>"/>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/fancybox/jquery.fancybox.css') %>"/>
    <link rel="stylesheet" type="text/css" href="<% URL::to('theme/style/base.css') %>"/>

    <link rel="stylesheet" type="text/css" media="screen and (max-width:969px)"
          href="<% URL::to('theme/style/responsive/width-0-969.css') %>"/>
    <link rel="stylesheet" type="text/css" media="screen and (max-width:767px)"
          href="<% URL::to('theme/style/responsive/width-0-767.css') %>"/>

    <link rel="stylesheet" type="text/css" media="screen and (min-width:480px) and (max-width:969px)"
          href="<% URL::to('theme/style/responsive/width-480-969.css') %>"/>
    <link rel="stylesheet" type="text/css" media="screen and (min-width:768px) and (max-width:969px)"
          href="<% URL::to('theme/style/responsive/width-768-969.css') %>"/>
    <link rel="stylesheet" type="text/css" media="screen and (min-width:480px) and (max-width:767px)"
          href="<% URL::to('theme/style/responsive/width-480-767.css') %>"/>
    <link rel="stylesheet" type="text/css" media="screen and (max-width:479px)"
          href="<% URL::to('theme/style/responsive/width-0-479.css') %>"/>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Voces"/>
    <link rel="stylesheet" type="text/css"
          href="http://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800"/>

    <script type="text/javascript" src="<% URL::to('theme/script/linkify.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery-ui.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.easing.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.blockUI.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.qtip.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.fancybox.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.scrollTo.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.supersized.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.elastic.source.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.infieldlabel.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.carouFredSel.packed.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/jquery.supersized.shutter.min.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('js/jquery.smooth-scroll.js') %>"></script>
    <!--    <script src="http://malsup.github.com/jquery.form.js"></script>-->

    <script type="text/javascript" src="<% URL::to('theme/script/script.js') %>"></script>
    <script type="text/javascript" src="<% URL::to('theme/script/main.js') %>"></script>

    <%HTML::script('js/jquery.validate.min.js')%>
    <%HTML::script('js/additional-methods.min.js')%>

</head>

<body>

<div class="main main-body">

<!-- Header -->
<div class="header clear-fix">

    <div class="layout-50p clear-fix">

        <!-- Logo -->
        <div id="top" class="layout-50p-left clear-fix">
            <a style="background: none" href="http://adrindia.org/" class="header-logo" target="_blank"><img
                    src="<% URL::to('img/logo/adr_left_logo.png') %>" alt=""></a>
        </div>
        <!-- /Logo -->

        <div class="layout-50p-right">

            <div style="background: none;padding-right: 0px" class="header-phone">
                <a href="http://myneta.info/" target="_blank"><img src="<% URL::to('img/logo/right_logo.png') %>"
                                                                   alt=""></a>
            </div>

        </div>

    </div>

</div>
<!-- /Header -->

<!-- Content -->
<div class="content clear-fix">

<ul class="no-list clear-fix section-list">

<!--start message-->
@if(Session::has('message'))
<li id="message" class="text-center clear-fix">
    <h4>
        <% Session::get('message') %>
    </h4>
</li>
<!--end message-->
@endif


<li class="text-center clear-fix">
    <h4>
        Last date for submitting entries extended to 15th of November!!
    </h4>
</li>
<!-- Main -->
<li class="text-center clear-fix">

    <h1 style="" class="margin-bottom-0">Mera Vote, Mera Desh</h1>


    <p class="subtitle-paragraph margin-top-20 margin-bottom-50 clear-fix">
        Participate in our National Competition!

        <span class="bold">Let’s reclaim our democracy, let’s reclaim our country</span>

    </p>

    <a href="#about" id="aboutCompetition" class="button-black">About Competition</a>

    <a href="#submitEntry" id="submitEntryLink" class="button-black clear-fix">
        Submit Entry
    </a>

</li>
<!-- /Main -->


<!-- Gallery -->
<li class="padding-0 no-background position-relative">

    <div class="main overflow-hidden">

        <!-- Image list -->
        <ul class="no-list image-list image-list-carousel">

            <!-- Image -->
            <li>
                <h3>Crime</h3>

                <div>
                    <a href="<% URL::to('img/slides/crime slide.jpg') %>"
                       class="preloader overlay-image fancybox-image" rel="gallery-1">
                        <img src="<% URL::to('img/slides/Crime Small.png') %>" alt=""/>
                        <span></span></a>

                    <p>&nbsp;</p>
                </div>
            </li>
            <!-- /Image -->

            <!-- Image -->
            <li>
                <h3>Money</h3>

                <div>
                    <a href="<% URL::to('img/slides/Money slide.jpg') %>"
                       class="preloader overlay-image fancybox-image" rel="gallery-1">
                        <img src="<% URL::to('img/slides/money small.png') %>" alt=""/>
                        <span></span>
                    </a>


                    <p>&nbsp;</p>
                </div>
            </li>
            <!-- /Image -->

            <!-- Image -->
            <li>
                <h3>Representation</h3>

                <div>
                    <a href="<% URL::to('img/slides/Representation.JPG') %>"
                       class="preloader overlay-image fancybox-image" rel="gallery-1">
                        <img src="<% URL::to('img/slides/represntation.png') %>" alt=""/>
                        <span></span>
                    </a>

                    <p>&nbsp;</p>
                </div>
            </li>
            <!-- /Image -->

            <!-- Image -->
            <li>
                <h3>Video</h3>

                <div>
                    <a href="http://www.youtube.com/embed/bbtPb5KIxF0?autoplay=1" target="_blank"
                       class="preloader fancybox-video-youtube overlay-video ">
                        <img src="<% URL::to('img/slides/AMIR KHAN VIDEOS JPEG.PNG') %>" alt=""/>
                        <span></span>
                    </a>

                    <p>&nbsp;</p>
                </div>
            </li>
            <!-- /Image -->

            <!-- Video -->
            <li>
                <h3>Milestones</h3>

                <div>
                    <a href="<% URL::to('img/slides/Milestones.JPG') %>"
                       class="preloader overlay-image fancybox-image">
                        <img src="<% URL::to('img/slides/milestone small.png') %>" alt=""/>
                        <span></span>
                    </a>

                    <p>&nbsp;</p>
                </div>
            </li>
            <!-- /Video -->

            <!-- Video -->

            <!-- /Video -->

            <!-- Video -->

            <!-- /Video -->

        </ul>
        <!-- /Image list -->

        <!-- Navigation -->
        <a href="#" class="image-list-carousel-navigation-prev"></a>
        <a href="#" class="image-list-carousel-navigation-next"></a>
        <!-- /Navigation -->

    </div>

</li>
<!-- /Gallery -->


<!-- Features -->
<li id="about">

<h2>About <span><a href="#top"> Go to Top</a></span></h2>

<p class="subtitle-paragraph">
    We invite entries for a nationwide competition. We are looking for entries with a positive can-do message, with
    a dash of humour and an earthy touch that would appeal to the common voter.

</p>

<div class="layout-50 clear-fix">

<!-- Left column -->
<div class="layout-50-left clear-fix">

    <!-- Features list -->
    <ul class="about-list no-list  clear-fix">


        <!-- /Item -->

        <!-- Item -->
        <li>
            <h3>Language</h3>

            <p>
                Entries are welcome in any Indian language with English/Hindi translation.
            </p>
        </li>
        <!-- /Item -->

        <!-- Item -->
        <li>
            <h3>Prizes</h3>

            <p>
                Get a chance to be a part of our national campaign against crime and money in politics and win a
                prize and a certificate from an eminent jury. YOUR entries may be used in the campaign!
            </p>
        </li>
        <!-- /Item -->

        <!-- Item -->
        <li>
            <h3>LAST DATE</h3>

            <p>
                15th of November, 2013
                <br/>For reference please visit: <br/> <a href="http://adrindia.org/" target="_blank">http://adrindia.org/</a>
                . <a href="http://myneta.info/" target="_blank">http://myneta.info</a></p>
        </li>
        <!-- /Item -->

    </ul>
    <!-- /Features list -->

</div>
<!-- /Left column -->

<!-- Right column -->
<div class="layout-50-right">

    <!-- Accordion -->
    <div class="nostalgia-accordion clear-fix">

        <h3><a aria-selected="true" href="#">Categories</a></h3>

        <div>

            <div>

                <ul class="no-list list-1 clear-fix">

                    <li>
                        <span>1</span>

                        <p>Slogans</p>


                    </li>
                    <li>
                        <span>2</span>

                        <p>Videos</p>


                    </li>
                    <li>
                        <span>3</span>

                        <p>Songs</p>


                    </li>
                    <li>
                        <span>4</span>

                        <p>Cartoons</p>


                    </li>
                    <li>
                        <span>5</span>

                        <p>Photographs</p>


                    </li>
                    <li>
                        <span>6</span>

                        <p>Any other creative input</p>


                    </li>


                </ul>

            </div>

        </div>

        <h3><a href="#">Theme</a></h3>

        <div style="padding-left: 20px;padding-top: 20px">
            <h4>Let’s reclaim our democracy, let’s reclaim our country</h4>
            <br/>
            <h5>Your creative input should aim:</h5>

            <div>

                <ul class="no-list list-1 clear-fix">

                    <li>
                        <span>1</span>

                        <p>To empower each voter to stand up against crime and money in elections,</p>
                    </li>
                    <li>
                        <span>2</span>

                        <p>To impress upon each voter that selling your vote is equal to selling your
                            future.</p>
                    </li>
                    <li>
                        <span>3</span>

                        <p>To inspire fellow citizens to vote for clean candidates who can be better leaders for
                            a better government.</p>
                    </li>
                    <li>
                        <span>4</span>

                        <p>To call upon all citizens to be informed, to vote, to question, to demand
                            accountability, to participate in reclaiming our democracy and country.</p>
                    </li>

                </ul>

            </div>

        </div>

        <h3><a href="#">Rules</a></h3>

        <div>

            <div>

                <ul class="no-list list-1 clear-fix">

                    <li>
                        <span>1</span>

                        <p>There is no participation fee.</p>


                    </li>
                    <li>
                        <span>2</span>

                        <p>Submissions can be made online or sent to the ADR address. Entrants are entitled to
                            submit at a maximum of three creative inputs at one time. Additional entries can be
                            submitted through re-registration.</p>


                    </li>
                    <li>
                        <span>3</span>

                        <p>Selection of the best entries will be made by a jury. The jury will evaluate entries
                            based on relevance to the theme and purpose of the campaign, the power of the message,
                            creativity, and originality.</p>


                    </li>
                    <li>
                        <span>4</span>

                        <p>The entries should be fully original and any plagiarism of material used in the entries
                            will result in immediate disqualification of the participant</p>


                    </li>
                    <li>
                        <span>5</span>

                        <p>By entering the contest, the participant grants National Election Watch and Association for
                            Democratic Reforms exclusive rights to the winning creative input for use in any
                            format.</p>


                    </li>


                </ul>

            </div>

        </div>

    </div>
    <!-- /Accordion -->

</div>
<!-- /Right column -->

</div>

</li>
<!-- /Features -->

<?php $name = Input::old('name');
$mobile = Input::old('mobile');
$email = Input::old('email');
$address = Input::old('address');
$category = Input::old('category', "");
$state = Input::old('state', "");
$yourMessage = Input::old('yourMessage', "");

?>
<!-- Contact -->
<li id="submitEntry">

<h2>Submit Entries <span><a href="#top"> Go to Top</a></span></h2>


<div class="clear-fix layout-50">

    <!-- Left column -->
    <div class="layout-50-left">

        <h3>Online Entries</h3>

        <div class="contact-details-wrapper">

            <!-- Contact form -->
            <form name="contact-form" id="campaignForm" method="post" enctype="multipart/form-data"
                  action="<% URL::to('/add') %>" class="clear-fix">

                <div class="clear-fix">

                    <ul class="no-list form-line">
                        @if(Session::has('errorMessage'))
                        <li id="message" class=" clear-fix" style="padding-bottom: 10px;">
                            <h4 style="color: white">
                                <% Session::get('errorMessage') %>
                            </h4>
                        </li>
                        <!--end message-->
                        @endif
                        <li class="clear-fix block">
                            <label for="name">Your Name (required)</label>
                            <input type="text" name="name" id="name" value="<% $name %>"/>
                        </li>
                        <li class="clear-fix block">
                            <label for="email">Your Email (required)</label>
                            <input type="text" name="email" id="email" value="<% $email %>"/>
                        </li>
                        <li class="clear-fix block">
                            <label for="mobile">Your Mobile (required)</label>
                            <input type="text" name="mobile" id="mobile" value="<% $mobile %>"/>
                        </li>
                        <li class="clear-fix block">
                            <label for="address">Your Address</label>
                            <textarea name="address" id="address" rows="1"
                                      cols="1"><% $address %></textarea>
                        </li>
                        <li class="clear-fix block" style="width: 100%">
                            <select id="state" name="state"
                                    style="width: 100%;font-family: Dosis, Arial;font-size: 16px;">
                                <option value="" selected="">Select State</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="NCT-Delhi">NCT-Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>

                        </li>

                        <li class="clear-fix block" style="width: 100%">
                            <!--                                <label for="contact-form-mail">Your e-mail</label>-->
                            <select id="category" name="category"
                                    style="width: 100%;font-family: Dosis, Arial;font-size: 16px;">

                                <option value="Slogans">Slogans</option>
                                <option value="Videos">Videos</option>
                                <option value="Songs">Songs</option>
                                <option value="Cartoons">Cartoons</option>
                                <option value="Photographs">Photographs</option>
                                <option value="Others">Others</option>
                            </select>
                        </li>
                        <li class="clear-fix block">
                            <label for="yourMessage">Say a few words about your creative input</label>
                            <textarea name="yourMessage" id="yourMessage" rows="1"
                                      cols="1"><% $yourMessage %></textarea>
                        </li>
                        <li class="clear-fix block" style="width: 100%">
                            <div id="addFilesDiv">
                                <p style="color: white;padding: 0px;" id="allowedTypes"> Allowed file types : jpg,
                                    jpeg, gif, png, tiff, doc, docx, pdf, txt, odt</p>

                                <p style="color: white;padding: 0px;">Maximum file size : 100 MB</p>

                                <p style="color: white;padding: 0px;" id="allowedDuration"></p>
                                <input
                                    style="width: 100%;padding-left: 0px;color: white;border: none;background: none"
                                    type="file" id="campaignFiles" class="file_input"
                                    name="campaignFiles[]">

                            </div>


                        </li>

                        <li class="clear-fix" style="padding-bottom: 5px;">
                            <!--                                <button class="button-black" id="addMore" data-count=1 type="button">Add More Files</button>-->
                            <a href="#" class="button-black add_more_button" id="addMore"
                               data-count=1 type="button">Add More
                                Files</a>

                        </li>
                        <li style="width: 100%" class="clear-fix block">
                            <span id="captchaText" ">Are you human, <% $captcha %>
                            </span>
                            <input type="text"
                                   name="captcha"
                                   id="captcha" value=""/>


                        </li>
                        <li class="clear-fix block" style="width: 100%">
                            <input id="campaignSubmit" type="submit" class="button" style="width: 100%"
                                   value="Send"/>
                        </li>

                        <li style="color: white;" class=" clear-fix">
                            <div style="padding-bottom: 10px;" id="errorMessage" style="display: none">

                            </div>
                        </li>

                        <li class=" clear-fix" id="submitMessage" style="display: none;color: white;">
                            <div style="padding-bottom: 10px;">
                                <p>Thanks for submitting your entry, please wait <span
                                        style="padding-left: 10px;"><img src="<% URL::to('img/loader.gif') %>"
                                                                         alt=""></span></p>
                            </div>
                        </li>

                    </ul>

                </div>

            </form>
            <!-- /Contact form -->
        </div>

    </div>
    <!-- /Left column -->

    <!-- Right column -->
    <div class="layout-50-right offline-entries">

        <h3>Offline Entries</h3>
        <br/>
        <h4>To submit your entries offline, mail at</h4>

        <p style="padding-bottom: 0px;">Association For Democratic Reforms </p>

        <p style="padding-bottom: 0px;padding-top:0px">Kiwanis Centre Building</p>

        <p style="padding-bottom: 0px;padding-top:0px">4th Floor, B-35</p>

        <p style="padding-bottom: 0px;padding-top:0px">Qutub Institutional Area</p>

        <p style="padding-bottom: 0px;padding-top:0px">New Delhi-110016</p>

        <p style="padding-bottom: 0px;padding-top:0px">Landmark: Near Rockland Hospital</p>
        <br/>
        <h4>For more information or queries call us at</h4>

        <p style="padding-bottom: 0px">Helpline No. : 91-80103-94248</p>

        <p style="padding-bottom: 0px;padding-top:0px">Or Email us at: <a href="mailto:campaign@adrindia.org">campaign@adrindia.org</a>
        </p>

    </div>
    <!-- /Right column -->

</div>

</li>
<!-- Contact -->

</ul>

</div>
<!-- /Content -->


<!-- Footer -->
<div class="footer layout-50 clear-fix">

    <!-- Left column -->
    <div class="layout-50-left" style="min-height:197px">

        <h3>Network With Us</h3>

        <!-- Latest tweets -->
        <div id="latest-tweets"></div>
        <!-- /Latest tweets -->
        <!-- Social icons list -->
        <ul class="no-list social-list clear-fix">
            <li><a style="background-color:transparent;" href="http://twitter.com/#!/adrspeaks" target="_blank"
                   class="social-list-twitter"></a></li>
            <li><a style="background-color:transparent;" href="http://www.facebook.com/adr.new" target="_blank"
                   class="social-list-facebook"></a></li>
            <li><a style="width:90px;background-color:transparent;" href="http://www.youtube.com/user/adrspeaks"
                   target="_blank" class="social-list-googleplus"></a></li>
        </ul>
        <!-- /Social icons list -->

    </div>
    <!-- /Left column -->

    <!-- Right column -->
    <div class="layout-50-right" style="min-height:197px">

        <h3>Subscribe to Google Groups</h3>

        <p>
            To receive our latest press releases and reports, please enter your email address below
        </p>
        <!-- Newsletter form -->
        <form id="newsletter-form" action="http://groups.google.com/group/national-election-watch/boxsubscribe"
              class="clear-fix" target="_blank">
            <div class="clear-fix">
                <ul class="no-list form-line">
                    <li class="clear-fix block">
                        <label for="newsletter-form-mail">Your e-mail</label>
                        <input name="email" type="text" id="newsletter-form-mail" value=""/>
                        <input style="border-color: #000000;height: 100%;" type="submit" id="newsletter-form-send"
                               name="newsletter-form-send"
                               class=""
                               value="Join"/>
                    </li>

                </ul>

            </div>

        </form>


        <!-- /Newsletter form -->

    </div>
    <!-- /Right column -->

</div>
<!-- /Footer -->

</div>

<!-- Background overlay -->
<div id="background-overlay"></div>
<!-- /Background overlay -->
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">

    //code for adding
    $(document).ready(function () {
        var state = "<%$state%>";
        var category = "<%$category%>";
        $("#state").val(state);
        $("#category").val(category);
        $('#addMore').click(function (e) {
            e.preventDefault();
            var count = $(this).data('count');
            if ($(this).data('count') == 3) {
                alert('Only three files are allowed')
                return false;
            }

            $(this).data('count', count + 1);
            var text = $('#addFileInput').html();
            $('#addFilesDiv').append(text);
        });


        $(".file_input").live("change", function (e) {
            if (!$(this).val()) {
                $(this).removeClass('error');
                return;
            }
            $(this).removeClass().addClass('file_input');
            var extArr = $(this).val().split('.');
            var length = extArr.length;
            var ext = '';
            if (length > 1) {
                ext = extArr[length - 1];
            }

            var category = $.trim($("#category option:selected").val());
            var allowedTypes = null;
            var fileTypes = "";
            if (category == "Cartoons" || category == "Photographs") {

                fileTypes = "jpg, jpeg, gif, png, tiff";
                allowedTypes = new Array('jpg', 'jpeg', 'gif', 'png', 'tiff');
            } else if (category == "Slogans") {
                fileTypes = "jpg, jpeg, gif, png, tiff, doc, docx, pdf, txt, odt";
                allowedTypes = new Array('jpg', 'jpeg', 'gif', 'png', 'tiff', 'doc', 'docx', 'pdf', 'txt', 'odt');

            } else if (category == "Videos") {
                allowedTypes = new Array('mp4', 'mov', 'avi', 'mpeg', 'wmv');
                fileTypes = "mp4, mov, avi, mpeg, wmv";
            } else if (category == "Songs") {
                allowedTypes = new Array('mp3', 'wav', 'amr');
                fileTypes = " mp3, wav, amr";
            }
            var errorDiv = $('#errorMessage');
            if (category == "Others") {
                var excludedTyes = new Array('exe', 'php', 'bat', 'sh', 'pl', 'msi');
                console.log(jQuery.inArray(ext, excludedTyes));
                if (jQuery.inArray(ext, excludedTyes) != -1 || ext == '') {
                    errorDiv.show();
                    $(this).addClass('error');
                    errorDiv.html('<p>This file type is not allowed.</p>');
                    return;
                }
            }
            if (jQuery.inArray(ext, allowedTypes) == -1) {
                errorDiv.show();
                $(this).addClass('error');
                errorDiv.html('<p>' + 'Invalid file extension, only ' + fileTypes + '</p>');
                return;

            }


            var iSize = ($(this)[0].files[0].size / 1024);
            iSize = (Math.round((iSize / 1024) * 100) / 100);

            if (iSize > 100) {
                $(this).addClass('error');
                errorDiv.show();
                errorDiv.html('<p>File size must be less than 100mb</p>');
            } else {
                errorDiv.show();
                errorDiv.html('<p></p>');
            }
        });

        $('#campaignSubmit').click(function (e) {

            var errorDiv = $('#errorMessage');
            errorDiv.show();
            var fileInput = $('.file_input');
            var isValidFiles = true;
            var error = false;
            errorDiv.html('');
            fileInput.each(function () {
                var $this = $(this);
                if ($this.hasClass('error')) {

                    errorDiv.append('<p>' + "Invalid file attached, please select other file or remove " + $this.val() + '</p>');
                    isValidFiles = false;
                    return false;
                } else {
                    isValidFiles = true;
                }
            });
            if (!isValidFiles) {
                e.preventDefault();
                error = true;
            }
//
            var name = $.trim($('#name').val());
            var email = $.trim($('#email').val());
            var mobile = $.trim($('#mobile').val());
            if (!name) {
                e.preventDefault();
                errorDiv.append('<p>' + "Please provide your Name" + '</p>');
                error = true;
            }
            if (!isValidEmailAddress(email)) {
                e.preventDefault();
                errorDiv.append('<p>' + "Please provide a valid Email" + '</p>');
                error = true;
            }
            if (!validatePhone(mobile)) {
                e.preventDefault();
                errorDiv.append('<p>' + "Please provide a valid 10 digit Mobile number" + '</p>');
                error = true;
            }
            if (error) {
                return false;
            }

            $('#submitMessage').show();
            $(this).hide();

        });

        $('#category').on('change', function () {
            var category = $(this).val();
            var fileTypes = "";
            var isMedia = false;
            var mediaType = '';
            $('#allowedDuration').hide();
            if (category == "Songs") {
                fileTypes = " mp3, wav, amr";
                isMedia = true;
                mediaType = "audio";
            } else if (category == "Slogans") {
                fileTypes = "jpg, jpeg, gif, png, tiff, doc, docx, pdf, txt, odt";
            } else if (category == "Videos") {
                fileTypes = "mp4, mov, avi, mpeg, wmv";
                isMedia = true;
                mediaType = "video";
            }
            else {
                fileTypes = "jpg, jpeg, gif, png, tiff";
            }
            $('#allowedTypes').html('Allowed file types : ' + fileTypes).show();
            if (category == "Others") {
                $('#allowedTypes').html('No scripts, executables or other such formats allowed.');
            }
            if (isMedia) {
                $('#allowedDuration').html('Maximum allowed ' + mediaType + ' duration : 5 mins').show();
            }
        });

        function isValidEmailAddress(emailAddress) {
            if (!emailAddress)
                return false;
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        }

        function validatePhone(txtPhone) {
            if (!txtPhone)
                return false;
            var filter = /^\d{10}$/;
            return filter.test(txtPhone);

        }

        $('#aboutCompetition').click(function (e) {

            e.preventDefault();
            $.smoothScroll({scrollTarget: '#about'});
        });
        $('#submitEntryLink').click(function (e) {

            e.preventDefault();
            $.smoothScroll({scrollTarget: '#submitEntry'});
        });
    });


</script>
<div id="addFileInput" style="display: none">
    <br/>

    <input type="file" class="file_input" id="campaignFiles" name="campaignFiles[]">
</div>


<!-- Google Analytics -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-26901527-3', 'adrindia.org');
    ga('send', 'pageview');

</script>


</body>

</html>
