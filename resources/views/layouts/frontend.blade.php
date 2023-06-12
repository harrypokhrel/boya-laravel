<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}" type="image/x-icon">
    <link rel="preload" href="{{asset('frontend/fonts/Manbow/manbow_solid-webfont.woff2')}}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/style2.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('frontend/css/slickmin.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicktheme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    @yield('styles')

    <title>BOYA</title>
  </head>
  <body>
    <header>
      <nav class="fixed top-0 left-0 right-0 flex items-center justify-between px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 pt-8 z-10 navbar-transparent text-white" id="navbar">
        <a href="/">
          <div class="flex items-center logoText text-xl lg:text-5xl 2xl:text-6xl 3xl:text-7xl">
            BOYA
          </div>
        </a>
        <ul class="flex items-center space-x-4">
          <li>
            <a href="{{route('activities')}}" class="nav-link">Activities</a>
          </li>
          <li>
            <a href="{{route('login')}}" class="nav-link">Login</a>
          </li>
        </ul>      
      </nav>

      <div class="slick-slider">
        <div class="slide-item">
          <div class="relative">
            <div class="relative overflow-hidden video-container">
              <video src="{{asset('frontend/img/vid1.mp4')}}" autoplay loop muted class="w-full h-[450px] xl:h-[700px]"></video>
              <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
            </div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
              <h1 class="headerText text-white font-bold text-4xl md:text-4xl xl:text-6xl uppercase">
                Book <br> <span class="h1Second text-4xl md:text-4xl xl:text-6xl font-extralight mb-5 whitespace-nowrap">Your Activities</span>
              </h1>
              <p class="headerP text-white text-sm xl:text-xl whitespace-nowrap">Water Sports & Adventure in UAE</p>
              <button class="bg-primary hover:bg-secondary transition-all ease-in-out duration-300 text-white text-xl font-light px-12 py-2 rounded-customxxl my-6">
                <a href="#">Let's go!</a>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="bookNow flex justify-center items-center">
        <form id="homepage_search_form" class="homepage__search__form" method="POST" action="{{route('activities')}}">
          <div class="bookNowMain hidden sm:flex absolute z-10 bg-white rounded-customlg lg:flex justify-between items-center w-[90%] md:w-[650px] xl:w-[755px] h-24">
            <div class="bookNowLeft px-10 py-6 xl:w-[600px]">

              <div class="">
                <label class="dropdown text-sm">
                  Category &nbsp;
                  <i class="fa-solid fa-chevron-down fa-xs"></i>
                  <br />
                  <div class="dropdown">
                    <select id="category" name="category">
                        <option value="">Select</option>
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 3</option>
                    </select>
                  </div>
                </label>
              </div>
          
              <div class="">
                <label class="dropdown text-sm" for="location">Location &nbsp;
                    <i class="fa-solid fa-chevron-down fa-xs"></i>
                    <br />
                    <div class="dropdown">
                    <select id="location" name="location">
                        <option value="">Select</option>
                        <option value="Abu Dhabi">Abu Dhabi</option>
                        <option value="Ajman">Ajman</option>
                        <option value="Al Ain">Al Ain</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Fujairah">Fujairah</option>
                        <option value="Sharjah">Sharjah</option>
                        <option value="Ras Al-Khaimah">Ras Al-Khaimah</option>
                        <option value="Umm Al-Quwain">Umm Al-Quwain</option>
                    </select>
                    </div>
                </label>
              </div>
          
              <div class="">
                <div class="relative">
                  <button id="dropdownToggle1" class="dropdown text-base">
                    <span>Total Person &nbsp;</span>
                    <i class="fa-solid fa-chevron-down fa-xs"></i>
                  </button><br>
                  <span id="totalCount1" class="dropdown-toggle leading-7 text-sm">Select</span>
                  <div id="dropdownMenu1" class="absolute mt-1 w-40 rounded-customsm shadow-lg bg-white ring-opacity-5 hidden -left-1">
                    <div class="py-2">
                      <div class="flex items-center justify-between px-4 py-2 text-sm leading-8 hover:bg-bg_gray focus:outline-none focus:bg-bg_gray">
                        <span>Adults</span>
                        <div class="flex items-center">
                          <button class="text-gray-500 focus:outline-none" onclick="decreaseCount('adultCount1')">
                            <i class="fa-solid fa-minus-circle"></i>
                          </button>
                          <span id="adultCount1" class="mx-2">1</span>
                          <input type="hidden" name="adult__count" id="adult__counter" value="0">
                          <button class="text-gray-500 focus:outline-none" onclick="increaseCount('adultCount1')">
                            <i class="fa-solid fa-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                      <div class="flex items-center justify-between px-4 py-2 text-sm leading-8 hover:bg-bg_gray focus:outline-none focus:bg-bg_gray">
                        <span>Children</span>
                        <div class="flex items-center">
                          <button class="text-gray-500 focus:outline-none" onclick="decreaseCount('childCount1')">
                            <i class="fa-solid fa-minus-circle"></i>
                          </button>
                          <span id="childCount1" class="mx-2">0</span>
                          <input type="hidden" name="kid__count" id="kid__counter" value="0">
                          <button class="text-gray-500 focus:outline-none" onclick="increaseCount('childCount1')">
                            <i class="fa-solid fa-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="flex items-center justify-center submit_button_banner_filter">
              <div class="bookNowRight text-white hover:text-secondary transition-all ease-in-out duration-300">
                <i class="fa-solid fa-calendar-days fa-xl pt-2"></i>
                <p class="bookNowText text-sm">Book Now</p>
              </div>
            </button>
          </div>

          <div class="mblBookNow flex sm:hidden md:hidden lg:hidden absolute z-10 bg-white rounded-customlg w-[90%] justify-center items-center">
            <div class="grid grid-cols-3 gap-x-8 w-full gap-y-2 px-5 py-4 justify-between items-center">
              <div class="">
                <label class="dropdown text-sm">
                  Category &nbsp;
                  <i class="fa-solid fa-chevron-down fa-xs"></i>
                  <br />
                  <div class="dropdown">
                    <button id="categoryDropdownToggle2" class="dropdown-toggle leading-7 text-sm">Select</button>
                    <ul class="dropdown-menu">
                      <li data-item="Item 1"><a href="#">Item 1</a></li>
                      <li data-item="Item 2"><a href="#">Item 2</a></li>
                      <li data-item="Item 3"><a href="#">Item 3</a></li>
                    </ul>
                  </div>
                </label>
              </div>
          
              <div class="">
                <label class="dropdown text-sm">
                  Location &nbsp;
                  <i class="fa-solid fa-chevron-down fa-xs"></i>
                  <br />
                  <div class="dropdown">
                    <button id="locationDropdownToggle2" class="dropdown-toggle leading-7 text-sm">Select</button>
                    <ul class="dropdown-menu">
                      <li data-item="Item 1"><a href="#">Item 1</a></li>
                      <li data-item="Item 2"><a href="#">Item 2</a></li>
                      <li data-item="Item 3"><a href="#">Item 3</a></li>
                    </ul>
                  </div>
                </label>
              </div>
          
              <div class="">
                <div class="relative">
                  <button id="dropdownToggle2" class="dropdown text-base">
                    <span>Persons &nbsp;</span>
                    <i class="fa-solid fa-chevron-down fa-xs"></i>
                  </button><br>
                  <span id="totalCount2" class="dropdown-toggle leading-7 text-sm">Select</span>
                  <div id="dropdownMenu2" class="absolute mt-1 w-40 rounded-customsm shadow-lg bg-white ring-opacity-5 hidden -left-12">
                    <div class="py-2">
                      <div class="flex items-center justify-between px-4 py-2 text-sm leading-8 hover:bg-bg_gray focus:outline-none focus:bg-bg_gray">
                        <span>Adults</span>
                        <div class="flex items-center">
                          <button class="text-gray-500 focus:outline-none" onclick="decreaseCount('adultCount2')">
                            <i class="fa-solid fa-minus-circle"></i>
                          </button>
                          <span id="adultCount2" class="mx-2">1</span>
                          <button class="text-gray-500 focus:outline-none" onclick="increaseCount('adultCount2')">
                            <i class="fa-solid fa-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                      <div class="flex items-center justify-between px-4 py-2 text-sm leading-8 hover:bg-bg_gray focus:outline-none focus:bg-bg_gray">
                        <span>Children</span>
                        <div class="flex items-center">
                          <button class="text-gray-500 focus:outline-none" onclick="decreaseCount('childCount2')">
                            <i class="fa-solid fa-minus-circle"></i>
                          </button>
                          <span id="childCount2" class="mx-2">0</span>
                          <button class="text-gray-500 focus:outline-none" onclick="increaseCount('childCount2')">
                            <i class="fa-solid fa-plus-circle"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
              <div class="col-span-3 flex justify-center items-center">
                <button type="submit" class="bg-primary text-white h-10 w-36 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 hover:bg-white hover:text-primary hover:outline-text_gray hover:border-0">
                    Book Now
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </header>

    @yield('content')

<div class="relative">
<div>
<!-- ====== Footer Section Start -->
<footer class="relative z-10 bg-bg_gray pt-40 lg:pt-64 px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 leading-none">
  <div class="text-xs md:text-md 2xl:text-lg leading-6">
    <div class="-mx-4 flex flex-wrap">
      <div class=" px-4 w-full md:w-2/3 lg:w-4/12">
        <div class="mb-10 w-full">
          <div class="footerBook col-span-2 md:col-span-1 pl-0 xl:pl-20">
            <h3 class="text-secondary text-lg 2xl:text-lg font-semibold mb-5 whitespace-nowrap">
              Book your Activities
            </h3>
            <ul class="">
              <li><a href="">info@bookyouractivities.com</a></li>
              <li><a href="">+971 566 922 440</a></li>
              <li>
                <div class="socialIcons">
                  <span class="socialCircle"
                    ><a href=""><i class="fa-brands fa-instagram fa-sm"></i></a
                  ></span>
                  <span class="socialCircle"
                    ><a href=""><i class="fa-brands fa-linkedin-in fa-sm"></i></a
                  ></span>
                  <span class="socialCircle"
                    ><a href=""><i class="fa-brands fa-facebook-f fa-sm"></i></a
                  ></span>
                  <span class="socialCircle"
                    ><a href=""><i class="fa-brands fa-twitter fa-sm"></i></a
                  ></span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class=" px-4 w-1/2 md:w-1/3 lg:w-2/12">
        <div class="mb-10 w-full">
          <div class="footerAbout">
            <h3 class="text-secondary text-lg 2xl:text-lg font-semibold mb-5">About</h3>
            <ul class="">
              <li><a href="">Company</a></li>
              <li><a href="">Career</a></li>
              <li><a href="">How it works</a></li>
              <li><a href="">Partners</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class=" px-4 w-1/2 md:w-1/3 lg:w-2/12">
        <div class="mb-10 w-full">
          <div class="footerEmirates">
            <h3 class="text-secondary text-lg 2xl:text-lg font-semibold mb-5">Emirates</h3>
            <ul class="">
              <li><a href="">Abu Dhabi</a></li>
              <li><a href="">Dubai</a></li>
              <li><a href="">Sharjah</a></li>
              <li><a href="">Ajman</a></li>
              <li><a href="">Fujairah</a></li>
              <li><a href="">RAK</a></li>
              <li><a href="">UMQ</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class=" px-4 w-1/2 md:w-1/3 lg:w-2/12">
        <div class="mb-10 w-full">
          <div class="footerActivities">
            <h3 class="text-secondary text-lg 2xl:text-lg font-semibold mb-5">Activities</h3>
            <ul class="">
              <li><a href="">Kayak </a></li>
              <li><a href="">Jet Ski </a></li>
              <li><a href="">Sea Walking </a></li>
              <li><a href="">Flyboard Flying </a></li>
              <li><a href="">Freediving </a></li>
              <li><a href="">Snuba Diving</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class=" px-4 w-1/2 md:w-1/3 lg:w-2/12">
        <div class="mb-10 w-full">
          <div class="footerLegal">
            <h3 class="text-secondary text-lg 2xl:text-lg font-semibold mb-5">Legal</h3>
            <ul class="lg:whitespace-nowrap">
              <li><a href="">Terms & Conditions </a></li>
              <li><a href="">Privacy Policy </a></li>
              <li><a href="">Cancellation Policy </a></li>
              <li><a href="">Refund Policy </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="relative copyright pb-10">
    <div class="">
      <div class="inline-grid grid-cols-1 sm:grid-cols-2 w-full text-secondary mt-5">
        <div class="flex items-center justify-center sm:justify-start">
          <p class="mb-2 text-center lg:text-left text-xs md:text-md">
            Copyright © Boya. All Rights Reserved.
          </p>
        </div>
        <div class="flex items-center justify-center md:justify-end">
          <p class="flex items-center justify-center text-xs sm:text-md">
            Designed with <span class="px-1"><i class="fa-solid fa-heart" style="color: var(--red);"></i></span> <a href="#">Fifth Designs</a>
          </p>
        </div>
      </div>      
    </div>
</section>
</footer>
<!-- ====== Footer Section End -->



<!-- test -->

</div>
 <div class="lastExplore px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 pt-8 absolute z-10 w-full">
  <div
    class="bg-primary w-full lg:h-80 h-56 rounded-customlg flex justify-center items-center flex-col"
  >
    <h2
      class="font-bold text-xl md:text-3xl lg:text-5xl lg:leading-[54px] text-white text-center mb-8"
    >
      Let's Explore The Beauty<br />
      of the U.A.E
    </h2>
    <button
      class="bg-white text-secondary h-12 w-40 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 hover:bg-secondary hover:text-white"
    >
      <a href="">Get Started</a>
    </button>
  </div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="asset('frontend/js/slickmin.js')}}"></script>
    <script src="asset('frontend/js/main.js')}}"></script>
    <script src="asset('frontend/js/slider.js')}}"></script>
    @stack('script')
    <script>
      
// dropdown
    document.getElementById('dropdownToggle1').addEventListener('click', function(e) {
        e.preventDefault();
        var dropdownMenu = document.getElementById('dropdownMenu1');
        dropdownMenu.classList.toggle('hidden');
    });
    
    document.getElementById('dropdownToggle2').addEventListener('click', function(e) {
        e.preventDefault();
        var dropdownMenu = document.getElementById('dropdownMenu2');
        dropdownMenu.classList.toggle('hidden');
    });
    
    function decreaseCount(countId) {
        var countElement = document.getElementById(countId);
        var count = parseInt(countElement.innerText);
        if (count > 0) {
        countElement.innerText = count - 1;
        updateTotalCount();
        }
    }
    
    function increaseCount(countId) {
        var countElement = document.getElementById(countId);
        var count = parseInt(countElement.innerText);
        countElement.innerText = count + 1;
        updateTotalCount();
    }
    
    function updateTotalCount() {
        var adultCount1 = parseInt(document.getElementById('adultCount1').innerText);
        var childCount1 = parseInt(document.getElementById('childCount1').innerText);
        var totalCount1 = adultCount1 + childCount1;
        document.getElementById('totalCount1').innerText = totalCount1;
    
        var adultCount2 = parseInt(document.getElementById('adultCount2').innerText);
        var childCount2 = parseInt(document.getElementById('childCount2').innerText);
        var totalCount2 = adultCount2 + childCount2;
        document.getElementById('totalCount2').innerText = totalCount2;
    }
    
    document.addEventListener('click', function(event) {
        event.preventDefault();
        var dropdownMenu1 = document.getElementById('dropdownMenu1');
        var dropdownToggle1 = document.getElementById('dropdownToggle1');
        var dropdownMenu2 = document.getElementById('dropdownMenu2');
        var dropdownToggle2 = document.getElementById('dropdownToggle2');
    
        if (!dropdownToggle1.contains(event.target) && !dropdownMenu1.contains(event.target)) {
        dropdownMenu1.classList.add('hidden');
        }
    
        if (!dropdownToggle2.contains(event.target) && !dropdownMenu2.contains(event.target)) {
        dropdownMenu2.classList.add('hidden');
        }
    });
  
    $('button.flex.items-center.justify-center.submit_button_banner_filter').click(function(){
        document.getElementById("homepage_search_form").submit();
    });

    </script>
  </body>
</html>