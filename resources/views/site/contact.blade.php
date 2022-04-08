@extends('template.master')

@section('content')
<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">{{ __('site.contact.title-1') }}</h1>
                    <span class="color-text-a">{{ __('site.contact.text-1') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Intro Single End /-->

<!--/ Contact Star /-->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-map box">
                    <div id="map" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.3672070185694!2d115.16069748764185!3d-8.81813832917329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25b3507660f8d%3A0xaa4f1f39b9cdd20e!2sJl.%20Telagasari%20No.5%2C%20Ungasan%2C%20Kec.%20Kuta%20Sel.%2C%20Kabupaten%20Badung%2C%20Bali%2080361!5e0!3m2!1sen!2sid!4v1649383621562!5m2!1sen!2sid" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 section-t8">
                <div class="row">
                    <div class="icon-box section-b2 col-md-4">
                        <div class="icon-box-icon">
                            <span class="ion-ios-paper-plane"></span>
                        </div>
                        <div class="icon-box-content table-cell">
                            <div class="icon-box-title">
                                <h4 class="icon-title">{{ __('site.contact.title-2') }}</h4>
                            </div>
                            <div class="icon-box-content">
                                <p class="mb-1">{{ __('site.footer.text-2') }}.
                                    <a href="mailto:spropertybali150@gmail.com" target="_blank">
                                        <span class="color-a">spropertybali150@gmail.com</span>
                                    </a>
                                </p>
                                <p class="mb-1">{{ __('site.footer.text-3') }}.
                                    <a href="https://wa.me/6281246851260 ">
                                        <span class="color-a">+62 8124 6851 260</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box section-b2 col-md-4">
                        <div class="icon-box-icon">
                            <span class="ion-ios-pin"></span>
                        </div>
                        <div class="icon-box-content table-cell">
                            <div class="icon-box-title">
                                <h4 class="icon-title">{{ __('site.contact.title-3') }}</h4>
                            </div>
                            <div class="icon-box-content">
                                <p class="mb-1">
                                    Jl. Telagasari no. 5, Ungasan
                                    <br> Kuta Selatan, Badung, Indonesia.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box col-md-4">
                        <div class="icon-box-icon">
                            <span class="ion-ios-redo"></span>
                        </div>
                        <div class="icon-box-content table-cell">
                            <div class="icon-box-title">
                                <h4 class="icon-title">{{ __('site.contact.title-4') }}</h4>
                            </div>
                            <div class="icon-box-content">
                                <div class="socials-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/s.property.3/" target="_blank" class="link-one">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://wa.me/6281246851260" target="_blank" class="link-one">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.instagram.com/s_propertybali/" target="_blank" class="link-one">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.youtube.com/channel/UCGgjS4sjFK_OJqdSLoV0-qg" class="link-one">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://linktr.ee/SPropertyBali" target="_blank" class="link-one">
                                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Contact End /-->
@endsection

