@extends('layouts.frontend')

@section('styles')
<style>
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
    }
    form#homepage_search_form {
        display: contents;
    }
</style>
@endsection

@section('content')
<div class="discoverSport px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 pt-36 py-36">
      <div class="discoverSportsHeader flex justify-between items-center pb-11">
        <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl xl:text-5xl 2xl:text-6xl lg:leading-[54px] text-secondary lg:max-w-2xl md:max-w-sm max-w-[12rem]">
          Discover Your Favorite Sports
        </h2>
        <div class="inline-block">
          <a href="" class="prev-arrow text-dark_gray hover:text-white transition-all ease-in-out duration-300"
            ><i class="fa-solid fa-chevron-left text-xs md:text-xl lg:text-2xl"></i
          ></a>
          <a href="" class="next-arrow text-dark_gray hover:text-white transition-all ease-in-out duration-300"
            ><i class="fa-solid fa-chevron-right text-xs md:text-xl lg:text-2xl"></i
          ></a>
        </div>
      </div>
      <div id="sportSlider" class="flex justify-center items-center gap-10 mb-10">
        @foreach($activities as $key => $row)
        @php
        if($row->featured_image)
        $featured_img = $row->featured_image;
        else
        $featured_img = 'https://www.si.com/.image/t_share/MTg1ODgyMTMxNzMyMzc1MjM1/sports_illustrated_2021_year_in_pictures_00007.jpg';
        @endphp
        <div>
         <div class="w-full px-1 md:px-2">
          <div class="sportSlide-item w-full h-auto mb-10 rounded-xl">
            <img src="{{ asset('images/activities/featured/'.$featured_img )}}" class="object-contain transition-all ease-in-out duration-300 hover:scale-110" alt="" />
          </div>
          <div class="">
            <div class="font-semibold text-2xl text-secondary flex justify-between items-center leading-10">
              <div>
                <h3>{{ $row->title }}</h3>
              </div>
              <div>
                <h3>AED {{ $row->price_weekday }}</h3>
              </div>
            </div>
            <div class="flex justify-between items-center">
              <div class="font-normal text-sm text-text_gray h-full leading-8">
                <div class="inline-flex justify-center items-center">
                  <i class="fa-solid fa-location-dot"></i> &nbsp;
                  <h4 class="">{{ $row->location }}</h4>
                </div>
                <div class="text-primary">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
                            <button
                class="flex justify-center items-center w-24 h-12 bg-white outline-text_gray transition-all ease-in-out duration-300 border hover:border-0 rounded-customsm text-secondary  hover:bg-primary  hover:text-white"
              >
                <a href="" class="text-xl font-normal">Book</a>
            </button>
            </div>
          </div>
         </div>
        </div>
        @endforeach
      </div>
    </div>


    <div class="chooseUs px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 pt-10 md:pt-36 py-20">
      <div class="ChooseUsHeader flex justify-between items-center pb-11">
        <h2 class="font-bold text-2xl md:text-3xl lg:text-5xl lg:leading-[54px] text-secondary lg:max-w-2xl max-w-xs">
          Why must Choose us
        </h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
        <div
          class="chooseUsCard relative w-100 lg:h-72 rounded-customlg outline-text_gray border hover:border-0"
        >
          <div
            class="cardLine absolute -left-[0.35em] top-20 md:top-12 lg:top-14 w-3 h-1/2 lg:h-40 bg-primary z-10 rounded-customlg"
          ></div>
          <div class="px-7 2xl:px-10 py-16 space-y-4 flex flex-col shortArrow" id="shortArrow">
            <h3 class="font-bold text-xl md:text-2xl lg:text-3xl text-secondary leading-tight">
              Best Team <br />
              Best Experience
            </h3>
            <p class="font-light text-sm text-text_gray leading-normal">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Pellentesque eget facilisis magna.
            </p>
              <button>
                <a href="" class="flex justify-end items-center">
                  <p class="moreDetailsTxt text-end font-light text-sm text-primary ease-in-out">More Details </p>
                </a>
                </button>
          </div>
        </div>

        <div class="chooseUsCard relative w-100 lg:h-72 rounded-customlg outline-text_gray border hover:border-0">
          <div class="cardLine absolute -left-[0.35em] top-20 md:top-12 lg:top-14 w-3 h-1/2 lg:h-40 bg-primary z-10 rounded-customlg"></div>
          <div class="px-7 2xl:px-10 py-16 space-y-4 flex flex-col shortArrow" id="shortArrow">
            <h3 class="font-bold text-xl md:text-2xl lg:text-3xl text-secondary leading-tight">
              Always have <br />
              Special Tickets 
            </h3>
            <p class="font-light text-sm text-text_gray leading-normal">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Pellentesque eget facilisis magna.
            </p>
            <button class="" >
              <a href="" class="flex justify-end items-center">
                <p class="moreDetailsTxt text-end font-light text-sm text-primary ease-in-out">More Details </p>
              </a>
             </button>
          </div>
        </div>

        <div class="chooseUsCard relative w-100 lg:h-72 rounded-customlg outline-text_gray border hover:border-0">
          <div
            class="cardLine absolute -left-[0.35em] top-20 md:top-12 lg:top-14 w-3 h-1/2 lg:h-40 bg-primary z-10 rounded-customlg"></div>
          <div class="px-7 2xl:px-10 py-16 space-y-4 flex flex-col shortArrow" id="shortArrow">
            <h3 class="font-bold text-xl md:text-2xl lg:text-3xl text-secondary leading-tight">
              Always Ready <br />
              Support 24/7
            </h3>
            <p class="font-light text-sm text-text_gray leading-normal">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Pellentesque eget facilisis magna.
            </p>
            <button>
              <a href="" class="flex justify-end items-center">
                <p class="moreDetailsTxt text-end font-light text-sm text-primary ease-in-out">More Details </p>
              </a>
             </button>
          </div>
        </div>
      </div>
    </div>

    <div class="orange h-80 bg-primary opacity-10"></div>

 <div class="relative">
  <div class="explore px-10 md:px-24 lg:px-36 xl:px-48 2xl:px-52 3xl:px-80 pt-10 md:pt-36 mb-5 md:mb-36 relative">
    <div class="exploreHeader flex justify-between items-center pb-10 lg:pb-20">
      <h2 class="font-bold text-2xl md:text-3xl lg:text-5xl lg:leading-[54px] text-secondary lg:max-w-2xl max-w-xs">
        Explore Top Place
      </h2>
    </div>
   
<div class="md:mx-10 mx-auto">
  <div id="filters" class="mb-10 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-8 3xl:grid-cols-8 gap-x-5">
    <button class="mb-5 bg-primary text-white text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 hover:bg-white hover:text-primary hover:outline-text_gray hover:border whitespace-nowrap" data-filter="*">
      <p>All Emirates</p>
    </button>
    <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" filter=".metal"
  >
    <p>Dubai</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter=".transition"
  >
    <p>Abu Dhabi</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter=".alkali, .alkaline-earth"
  >
    <p>Sharjah</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter=":not(.transition)"
  >
    <p>Fujairah</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter="numberGreaterThan50"
  >
    <p>RAK</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter="ium"
  >
    <p>Ajman</p>
  </button>
  <button
    class="mb-5 bg-white text-primary text-sm md:text-md h-9 w-full 3xl:px-0 rounded-customxxl flex justify-center items-center transition-all ease-in-out duration-300 outline-text_gray border hover:text-white hover:bg-primary hover:border whitespace-nowrap" data-filter=".metal:not(.transition)"
  >
    <p>UMQ</p>
  </button>
  </div>
</div>

<div class="relative flex flex-col justify-center">
  <div
    class="columns-1 sm:columns-2 xl:columns-3 2xl:columns-3 gap-5 [column-fill:_balance] box-border mx-auto before:box-inherit after:box-inherit">
    <div class="break-inside-avoid" data-category="transition">
        <div class="exploreCard mb-5">
          <img src="https://cdn.pixabay.com/photo/2019/05/28/00/13/surfer-4234061_1280.jpg" class="exploreCard1 object-cover" alt="" />
          <div class="overlay">
            <div class="text">
              <h4 class="font-semibold text-2xl">Jet Ski</h4>
              <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
              <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
                <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
              </button>
            </div>
        </div>
    </div>
  </div>
    <div class="break-inside-avoid">
      <div class="exploreCard mb-5">
        <img src="https://abudhabimarine.ae/img/containers/assets/ski-boarding-abu-dhabi-marine-1.jpg/0c79a4744a8fc59bb1654645871b572c.webp" class="exploreCard2 object-cover" alt="" />
        <div class="overlay">
          <div class="text">
            <h4 class="font-semibold text-2xl">Jet Ski</h4>
            <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
            <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
              <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
            </button>
          </div>
      </div>
  </div>
    </div>
    <div class="break-inside-avoid">
      <div class="exploreCard mb-5">
        <img src="https://abudhabimarine.ae/img/containers/assets/efoil-abu-dhabi.jpg/d25dc762bfdb34a5694b53f4dee15977.webp" class="exploreCard2 object-cover" alt="" />
        <div class="overlay">
          <div class="text">
            <h4 class="font-semibold text-2xl">Jet Ski</h4>
            <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
            <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
              <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
            </button>
          </div>
      </div>
  </div>
    </div>
    <div class="break-inside-avoid">
      <div class="exploreCard mb-5">
        <img src="https://res.klook.com/images/fl_lossy.progressive,q_65/c_fill,w_1295,h_863/w_80,x_15,y_15,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/o3l53akljywomjjv14be/ParasailingandQuadBikeDayTourfromSharmElSheikh.webp" class="exploreCard1 object-cover" alt="" />
        <div class="overlay">
          <div class="text">
            <h4 class="font-semibold text-2xl">Jet Ski</h4>
            <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
            <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
              <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
            </button>
          </div>
      </div>
  </div>
    </div>
    <div class="break-inside-avoid">
      <div class="exploreCard mb-5">
        <img src="https://abudhabimarine.ae/img/containers/assets/fun-things-to-do-abu-dhabi.JPG/2c4ec0999727407ee240c66849dec710.webp" class="exploreCard1 object-cover" alt="" />
        <div class="overlay">
          <div class="text">
            <h4 class="font-semibold text-2xl">Jet Ski</h4>
            <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
            <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
              <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
            </button>
          </div>
      </div>
  </div>
  </div>

  <div class="break-inside-avoid">
    <div class="exploreCard mb-5">
      <img src="https://abudhabimarine.ae/img/containers/assets/abu-dhabi-doughnuts-marine-water-sports.jpg/a34c0f8f9f914cbf69404b2e3d19f318.webp" class="exploreCard2 object-cover" alt="" />
      <div class="overlay">
        <div class="text">
          <h4 class="font-semibold text-2xl">Jet Ski</h4>
          <p class="font-normal text-base whitespace-nowrap">Dubai Marina, Dubai</p>
          <button class="w-28 h-10 bg-white rounded-customsm mt-3 text-secondary hover:bg-primary hover:text-white">
            <a href=""><h4 class="text-xl font-normal">Book Now</h4></a>
          </button>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection