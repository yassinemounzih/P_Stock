@extends('layouts.website')

@section('content')

    <!-- ****** Welcome Area Start ****** -->
    <section class="caviar-hero-area" id="home">
        <!-- Welcome Social Info -->
        <div class="welcome-social-info">
            <a href="https://www.facebook.com/asquick.livraison/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/asquick4/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <!-- Welcome Slides -->
        <div class="caviar-hero-slides owl-carousel">
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img" style="background-image: url({{asset('website')}}/img/bg-img/slider2.jpeg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>Stock</h2>
                                <p> Vous pouvez  suivre en temps réel l'évolution de votre inventaire sur notre plateforme. Vos produits sont typiquement disponibles à la vente dès J+0. Et nous les stockons gratuitement.
                                </p>
                                <a href="#" class="btn caviar-btn"><span></span> Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img" style="background-image: url({{asset('website')}}/img/bg-img/slider1.jpg);"></div>
            </div>
            <!-- Single Slides -->
            <div class="single-hero-slides bg-img" style="background-image: url({{asset('website')}}/img/bg-img/slider1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-11 col-md-6 col-lg-4">
                            <div class="hero-content">
                                <h2>Une solution</h2>
                                <p>Envoyez-nous votre stock et connectez votre site e-commerce à notre logiciel logistique.
                                    <br> Pour plus  informations n'hésiter pas à nous contacter
                                    <span> <br> GSM: +212669341313 / +212669836984</span>
                                   <span> <br> E-MAIL: asquick.livraison@gmail.com </span>


                                </p>
                                <a href="#" class="btn caviar-btn"><span></span> Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Nav -->
                <div class="hero-slides-nav bg-img" style="background-image: url({{asset('website')}}/img/bg-img/slider2.jpeg);"></div>
            </div>
        </div>
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** About Us Area Start ****** -->
    <section class="caviar-about-us-area section-padding-150" id="about">
        <div class="container">
            <!-- About Us Single Area -->
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('website')}}/img/bg-img/slider7.jpeg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-md-auto">
                    <div class="section-heading">
                        <h2> Qui Sommes-Nous</h2>
                    </div>
                    <div class="about-us-content">
                        <span>AS QUICK :</span>
                        <p>est avant tout une équipe dédiée à la satisfaction de ses clients. Notre société associe plusieurs compétences nous permettons d'être spécialisée et innovant dans la livraison. Une expérience client parfaite depuis le départ jusqu'à la livraison du produit. AS QUICK est l'un des principaux fournisseurs de solutions logistiques de bout en bout, axée sur la rapidité, la sécurité et la fiabilité des services de livraison express à l'échelle nationale dans le secteur du commerce électronique.</p>
                    </div>
                </div>
            </div>
            <!-- About Us Single Area -->
            <div class="about-us-second-part">
                <div class="row align-items-center pt-200">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="about-us-content">
                            <span>AS QUICK</span>
                            <p>AS QUICK Société marocaine spécialisée dans la livraison e-commerce, nous proposons des solutions optimales pour une livraison rapide et disponible a votre service 7/7 .</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ml-md-auto">
                        <div class="about-us-thumbnail wow fadeInUp" data-wow-delay="0.5s">
                            <img src="{{asset('website')}}/img/bg-img/slider5.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->

{{-- 
    <!-- ****** Awards Area Start ****** -->
    <section class="caviar-awards-area" id="awards">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-2">
                    <div class="section-heading">
                        <h2>Awards</h2>
                    </div>
                </div>
                <div class="col-12 col-md-9 ml-md-auto">
                    <div class="caviar-awards d-sm-flex justify-content-between">
                        <img src="{{asset('website')}}/img/awards-img/a-1.png" alt="">
                        <img src="{{asset('website')}}/img/awards-img/a-2.png" alt="">
                        <img src="{{asset('website')}}/img/awards-img/a-3.png" alt="">
                        <img src="{{asset('website')}}/img/awards-img/a-4.png" alt="">
                        <img src="{{asset('website')}}/img/awards-img/a-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Awards Area End ****** --> --}}

    {{-- <!-- ****** Testimonials Area Start ****** -->
    <section class="caviar-testimonials-area" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-content">
                        <div class="section-heading text-center">
                            <h2>Services</h2>
                        </div>
                        <div class="caviar-testimonials-slides owl-carousel">
                          

                      
                           
                            <!-- Single Testimonial Area -->
                            <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                    <img src="{{asset('website')}}/img/testimonial-img/livraison-express.png" alt="">
                                    <div class="tes-name">
                                        <h5>LIVRAISON EXPRESS</h5>
                                        <p>ASQUICK :</p>
                                    </div>
                                </div>
                                <p>vous assure la livraison de vos produits dans un temps record par des livreurs expérimentés avec moins de retour.</p>
                            </div>
                              <!-- Single Testimonial Area -->
                              <div class="single-testimonial">
                                <div class="testimonial-thumb-name d-flex align-items-center">
                                   
                                    <img src="{{asset('website')}}/img/testimonial-img/suivie.png" alt="">
                                    <div class="tes-name">
                                        <h5>SUIVI</h5>
                                        <p>ASQUICK :</p>
                                    </div>
                                </div>
                                <p>Nous mettons a votre disposition une équipe spéciale pour suivre le chemin de vos colis.</p>
                            </div>
                                  <!-- Single Testimonial Area -->
                                  <div class="single-testimonial">
                                    <div class="testimonial-thumb-name d-flex align-items-center">
                                        <img src="{{asset('website')}}/img/testimonial-img/moins-de-retour.png" alt="">
                                        <div class="tes-name">
                                            <h5>MOINS DE RETOUR</h5>
                                            <p>ASQUICK :</p>
                                        </div>
                                    </div>
                                    <p>En cas d'annulation d'une commande AS QUICK vous propose des solutions développées comme le changement de destination sur la même ville.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Testimonials Area End ****** --> --}}

    {{-- <!-- ****** Reservation Area Start ****** -->
    <section class="caviar-reservation-area d-md-flex align-items-center" id="contact">
        <div class="reservation-form-area d-flex justify-content-end">
            <div class="reservation-form">
                <div class="section-heading">
                    <h2>Contact</h2>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Select Persons">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="col-12">
                            <textarea name="reservation-message" class="form-control" id="reservationMessage" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn caviar-btn"><span></span> Reserve Your Desk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="reservation-side-thumb wow fadeInRightBig" data-wow-delay="0.5s">
            <img src="{{asset('website')}}/img/bg-img/contact6.jpg" alt="">
        </div>
    </section>
    <!-- ****** Reservation Area End ****** --> --}}

    <br>
    <br>
    <section id="contact">
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('website')}}/img/bg-img/contact.jpeg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Contact</h2>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+212669341313">+212669341313</a> <a href="tel:+212669836984">+212669836984</a></p>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> La Mosquée Bab Al-Rayan (Oulfa , Hay El Oulfa) .</p>
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:asquick.livraison@gmail.com">asquick.livraison@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- ****** Footer Area Start ****** -->
        <footer class="caviar-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-text">
                            <a href="#" class="navbar-brand">AS QUICK</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->

   
@endsection