@extends('website.layouts.header')
@section('styles') 
@endsection
@section('content')    
    <section class="banner become-an-advisor-banner d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="banner-heading m-0 mb-5 roboto fw-700">Rise by Lifting Others</h1>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- About Advice Section Start -->
    <section class="advice-section bg-gray py-5">
        <div class="container"> 
            <h2 class="roboto about-subtitle text-main text-center fw-700 mb-5">Why Become an Advisor at Zentia?</h2>
            <div class="row">
                <div class="col-md-4 pe-4 pe-sm-5 position-relative mb-5 mb-sm-0 d-flex">
                    <div class="how-it-word-overlay"></div>
                   <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                            <img src="assets/media/about-3.png" alt="" class="card-serach-img">
                        </div>
                        <h2 class="text-main roboto mb-2 mb-sm-4">Giving Back</h2>
                        <p class="text-center work-card-text">Use your experience and knowledge from your own career to help upcoming professionals with overcoming challenges and unlock their true potential.  Make a difference in someone else's life today.</p>
                   </div> 
                </div>
                <div class="col-md-4 pe-4 pe-sm-5 position-relative mb-5 mb-sm-0 d-flex">
                    <div class="how-it-word-overlay"></div>
                    <div class="work-card-wrap text-center py-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                            <img src="assets/media/about-2.png" alt="" class="card-serach-img">
                        </div>
                        <h2 class="text-main roboto mb-2 mb-sm-4">Earn Money</h2>
                        <p class="text-center work-card-text">You define your own rates for coaching sessions (with the option of keeping the money or donating to charity). You can also define the amount of time you want to spend on coaching. It's totally up to you.</p>
                    </div> 
                </div>
                <div class="col-md-4 pe-4 pe-sm-5 position-relative d-flex">
                 <div class="how-it-word-overlay"></div>
                     <div class="work-card-wrap text-center py-5 px-3">
                         <div class="work-card-img position-relative mb-4">
                             <img src="assets/media/card-bg.webp" alt="" class="position-relative card-bg-img">
                             <img src="assets/media/about-1.png" alt="" class="card-serach-img">
                         </div>
                         <h2 class="text-main roboto mb-2 mb-sm-4">Stay Up to Date</h2>
                         <p class="text-center work-card-text">By talking to upcoming professionals, you will be getting fresh input and inspiration as well - and get to know upcoming talented startups and founders, who are deeply passionate about what they do.</p>
                     </div> 
                 </div>
            </div>
        </div>
    </section>
    <!-- About Advice Section End -->
    <!-- Slider Section Start -->
    <section class="slider-section about-slider">
        <div class="advisor-bg-img bg-main-light d-flex justify-content-center align-items-center">
            <div class="container">
                <h2 class="slider-heading text-dark roboto text-center fw-700 mt-5"> “If I have seen further it's by standing on the shoulders of giants.”
                </h2>
                <h4 class="text-dark mt-1 mt-sm-2 pt-2 text-center exo">-  Isaac Newton </h4>
            </div>
        </div>
    </section>
    <!-- Slider Section End -->
    <!-- Coach Quotes Section Start -->
    <section class="slider-section pt-5">
        <div class="swiper middle-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="advisor-slider d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 ps-sm-5 order-1 order-sm-0">
                                    <div class="coach-profile-user-name mb-2 justify-content-start">
                                        <h3 class="coach-name roboto text-white mb-0">Patrick Theander</h3>
                                        <img src="./assets/media/correct.png" alt="" class="ms-4">
                                    </div>
                                    <p class="text-white fs-22 mb-3 mb-sm-5 advisor-small-text">Serial Entrepreneur, Investor, CEO</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">"“I’ve built and sold a cloud tech company - and became a millionaire in my twenties. Since then I’ve been investing in tech within different verticals and now I’m building a new venture fund.</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">I would describe myself as a “jack of all trades” kinda guy and I find great pleasure in being able to share my expertise and knowledge based on my experience both from the founder and investor side of things, with other driven people, who might be interested in doing something similar. </p>
                                    <p class="text-white mb-5 fs-22 advisor-small-text">Bouncing ideas off on others and getting their feedback can easily provide you with the necessary perspective to unlock the next level in your business. And talking to someone who has walked the path before you business wise, can provide you with the missing piece in the puzzle."</p>
                                </div>
                                <div class="col-md-6 pe-md-5 order-0 order-sm-1 mb-4 mb-sm-0">
                                    <img src="assets/media/patrick- theander.jpg" alt="" class="img-fluid advisor-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="swiper-slide">
                    <div class="advisor-slider d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 ps-sm-5 order-1 order-sm-0">
                                    <div class="coach-profile-user-name mb-2 justify-content-start">
                                        <h3 class="coach-name roboto text-white mb-0">Moisey Uretsky</h3>
                                        <img src="./assets/media/correct.png" alt="" class="ms-4">
                                    </div>
                                    <p class="text-white fs-22 mb-3 mb-sm-5 advisor-small-text">Co-founder of Digital Ocean, CEO, Investor</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">"I still remember what it's like being on the other side of the table - where a solid piece of advice could literally change everything.</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">I think it's all about surrounding yourself with people who can bring a different perspective to your journey and the challenges you're facing.</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">For me to be able to help and guide other passionate, upcoming entrepreneurs today, truly brings me energy and joy. "</p>
                                </div>
                                <div class="col-md-6 pe-md-5 order-0 order-sm-1 mb-4 mb-sm-0">
                                    <img src="assets/media/baa-img.webp" alt="" class="img-fluid advisor-img"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="swiper-slide">
                    <div class="advisor-slider d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 ps-sm-5 order-1 order-sm-0">
                                    <div class="coach-profile-user-name mb-2 justify-content-start">
                                        <h3 class="coach-name roboto text-white mb-0">Maiken Paaske</h3>
                                        <img src="./assets/media/correct.png" alt="" class="ms-4">
                                    </div>
                                    <p class="text-white fs-22 mb-3 mb-sm-5 advisor-small-text">Founder, CMO, Advisor</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">“I truly enjoy talking to passionate people from all over the world, who are super driven when it comes to building their business and career, and I love to pitch in with ideas and perspectives, and help them overcome whatever challenges they might be facing.</p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">I’ve spent millions of dollars on marketing strategies and campaigns over the years, spanning from big TV and branding campaigns to tactical digital performance based initiatives in both B2B and B2C tech scaleups. </p>
                                    <p class="text-white mb-4 fs-22 advisor-small-text">I would love to help others skip all the costly mistakes I’ve made in the past, and instead jump straight to what actually works in marketing."</p>
                                </div>
                                <div class="col-md-6 pe-md-5 order-0 order-sm-1 mb-4 mb-sm-0">
                                    <img src="assets/media/maiken-paaske.jpg" alt="" class="img-fluid advisor-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next slider-next-btn advisor-next-btn"></div>
            <div class="swiper-button-prev slider-prev-btn advisor-prev-btn"></div>
        </div>
    </section>
    <!-- Coach Quotes Section End -->
    <!-- About Advice Section Start -->
    <section class="advice-section bg-gray py-5">
        <div class="container"> 
            <h2 class="roboto about-subtitle text-white text-center fw-700 mb-5">We know flexibility is key, that's why you:</h2>
            <!-- <div class="row">
                <div class="col-md-3 pe-4 position-relative d-flex mb-5 mb-sm-0">
                    <div class="how-it-word-overlay advisor-overlay"></div>
                   <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/advisor1.png" alt="" class="card-serach-img advisor-card-img">
                        </div>
                        <p class="text-center work-card-text">Define your own rates for your time.</p>
                   </div> 
                </div>
                <div class="col-md-3 pe-4 position-relative d-flex mb-5 mb-sm-0">
                    <div class="how-it-word-overlay advisor-overlay"></div>
                    <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/advisor2.png" alt="" class="card-serach-img advisor-card-img">
                        </div>
                        <p class="text-center work-card-text">Define how much time you want to spend on sessions.</p>
                    </div> 
                </div>
                <div class="col-md-3 pe-4 position-relative d-flex mb-5 mb-sm-0">
                 <div class="how-it-word-overlay advisor-overlay"></div>
                     <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                         <div class="work-card-img position-relative mb-4">
                             <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                             <img src="assets/media/advisor3.png" alt="" class="card-serach-img advisor-card-img">
                         </div>
                         <p class="text-center work-card-text">Define what dates and hours fit into your calendar.</p>
                     </div> 
                </div>
                <div class="col-md-3 pe-4 position-relative d-flex">
                    <div class="how-it-word-overlay advisor-overlay"></div>
                    <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                        <div class="work-card-img position-relative mb-4">
                            <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                            <img src="assets/media/advisor4.png" alt="" class="card-serach-img advisor-card-img">
                        </div>
                        <p class="text-center work-card-text mb-0">Can have the session from anywhere in the world (it's virtual).</p>
                    </div> 
                </div>
            </div> -->
            <div class="swiper advisor-cards">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="pe-4 position-relative d-flex mb-5 mb-sm-0">
                            <div class="how-it-word-overlay advisor-overlay"></div>
                            <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                            <div class="work-card-img position-relative mb-4">
                                <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                                <img src="assets/media/advisor1.png" alt="" class="card-serach-img advisor-card-img">
                            </div>
                            <p class="text-center work-card-text card-desc-equal">Define your own rates for your time.</p>
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pe-4 position-relative d-flex mb-5 mb-sm-0">
                            <div class="how-it-word-overlay advisor-overlay"></div>
                            <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                                <div class="work-card-img position-relative mb-4">
                                    <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                                    <img src="assets/media/advisor2.png" alt="" class="card-serach-img advisor-card-img">
                                </div>
                                <p class="text-center work-card-text card-desc-equal">Define how much time you want to spend on sessions.</p>
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pe-4 position-relative d-flex mb-5 mb-sm-0">
                            <div class="how-it-word-overlay advisor-overlay"></div>
                            <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                                <div class="work-card-img position-relative mb-4">
                                    <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                                    <img src="assets/media/advisor3.png" alt="" class="card-serach-img advisor-card-img">
                                </div>
                                <p class="text-center work-card-text card-desc-equal">Define what dates and hours fit into your calendar.</p>
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pe-4 position-relative d-flex">
                            <div class="how-it-word-overlay advisor-overlay"></div>
                            <div class="work-card-wrap text-center py-4 py-sm-5 px-3">
                                <div class="work-card-img position-relative mb-4">
                                    <img src="assets/media/card-bg.webp" alt="" class="position-relative advisor-card-bg-img">
                                    <img src="assets/media/advisor4.png" alt="" class="card-serach-img advisor-card-img">
                                </div>
                                <p class="text-center work-card-text card-desc-equal">Can have the session from anywhere in the world (it's virtual).</p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('register') }}" class="button-primary roboto discover-btn">Become an Advisor</a>
            </div>
        </div>
    </section>
@endsection
@section('scripts')  
@endsection