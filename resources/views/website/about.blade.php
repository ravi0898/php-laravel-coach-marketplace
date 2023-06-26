@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content') 
    <section class="banner about-banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="text-white fw-700 exo">Start From Experience</h1>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- About Advice Section Start -->
    <section class="advice-section bg-gray py-5">
        <div class="container"> 
            <h2 class="roboto about-subtitle text-main text-center fw-700 mb-5">Receive advice from the #1 most accomplished and experienced entrepreneurs and executives</h2>
            <div class="row">
                <div class="col-md-4 pe-4 pe-sm-5 position-relative mb-5 mb-sm-0">
                    <div class="how-it-word-overlay"></div>
                   <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                            <img src="assets/media/about-1.png" alt="" class="card-serach-img">
                        </div>
                        <h2 class="text-main roboto mb-4">Discover Advisors</h2>
                        <p class="text-center work-card-text">Discover accomplished and experienced entrepreneurs and executives from all over the world.</p>
                   </div> 
                </div>
                <div class="col-md-4 pe-4 pe-sm-5 position-relative mb-5 mb-sm-0">
                    <div class="how-it-word-overlay"></div>
                    <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                            <img src="assets/media/about-2.png" alt="" class="card-serach-img">
                        </div>
                        <h2 class="text-main roboto mb-4">Book Video Session</h2>
                        <p class="text-center work-card-text">Pick a date and the amount of time you would like to have with the advisor and book a video session.</p>
                    </div> 
                </div>
                <div class="col-md-4 pe-4 pe-sm-5 position-relative">
                 <div class="how-it-word-overlay"></div>
                     <div class="work-card-wrap text-center py-5 px-3">
                         <div class="work-card-img position-relative mb-4">
                             <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                             <img src="assets/media/about-3.png" alt="" class="card-serach-img">
                         </div>
                         <h2 class="text-main roboto mb-4">Receive Advice</h2>
                         <p class="text-center work-card-text">On the call, you will be able to ask questions, receive feedback, input and authentic advice from the advisor.</p>
                     </div> 
                 </div>
            </div>
        </div>
    </section>
    <!-- About Advice Section End -->
    <!-- Slider Section Start -->
    <section class="slider-section about-slider">
        <div class="swiper middle-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="about-bg-img d-flex justify-content-center align-items-center">
                        <div class="container">
                            <h2 class="slider-heading about-slider-heading text-main roboto text-center"> "33 percent of founders who are mentored by successful entrepreneurs go on to become top performers themselves." 
                            </h2>
                            <h4 class="text-main mt-5 pt-5 text-center exo">- TechCrunch</h4>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="about-bg-img about-bg-two d-flex justify-content-center align-items-center">
                        <div class="container">
                            <h2 class="slider-heading about-slider-heading text-main roboto text-center"> "33 percent of founders who are mentored by successful entrepreneurs go on to become top performers themselves." 
                            </h2>
                            <h4 class="text-main mt-5 pt-5 text-center exo">- TechCrunch</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next slider-next-btn"></div>
            <div class="swiper-button-prev slider-prev-btn"></div>
        </div>
    </section>
    <!-- Slider Section End -->
    <!-- About Desc Section Start -->
    <section class="about-desc-section position-relative py-5">
            <div class="aboutus-img"></div>
        <div class="container">
            <div class="about-us-content">
                <p class="roboto text-main mb-5">As a founder, everyone around you wants to provide you with their opinion... </p>
                <p class="roboto text-main mb-5">But you don't need a lot of opinions - you just need advice from the right people at the right time in your journey.</p>
                <p class="roboto text-main mb-0 mb-sm-5">Zentia is an exclusive digital gateway for people who want to connect with accomplished tier 1 entrepreneurs and executives 2-3 steps ahead of them for insightful 1:1 digital sessions.</p>
            </div>
        </div>
    </section>
    <!-- About Desc Section End -->
    <section class="about-detail-content bg-main-light py-5">
        <div class="container">
            <h2 class="tex-dark text-center fw-700 roboto mb-4 mb-sm-5">The Story Behind Our Brand</h2>
            <div class="about-detail text-center">
                <p class="text-dark roboto mb-5">Our brand name origins from the word 'scientia', which means: knowledge based on demonstrable and reproducible data and experience.</p>
                <p class="text-dark roboto">We immediately thought it would be a very appropriate description for our concept and the community we're creating.</p>
            </div>
        </div>
    </section>
    
@endsection
@section('scripts')  
@endsection