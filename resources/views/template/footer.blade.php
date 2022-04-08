<!--/ footer Star /-->
<section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">South Property Bali</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                {{ __('site.footer.text-1') }}
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">{{ __('site.footer.text-3') }} :</span><a href="https://wa.me/6281246851260 ">+62 8124 6851 260</a></li>
                <li class="color-a">
                  <span class="color-text-a">{{ __('site.footer.text-2') }} :</span> <a href="mailto:spropertybali150@gmail.com" target="_blank">
                    spropertybali150@gmail.com </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/s.property.3/" target="_blank">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://wa.me/6281246851260" target="_blank">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/s_propertybali/" target="_blank">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.youtube.com/channel/UCGgjS4sjFK_OJqdSLoV0-qg" target="_blank">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://linktr.ee/SPropertyBali" target="_blank">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a"><a href="#" target="_blank">SouthPropertyBali</a></span> All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
</footer>
  <!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/scrollreveal/scrollreveal.min.js') }}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('js/main.js') }}"></script>

<script>
  jQuery.validator.setDefaults({
      errorElement: 'span',
      errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
      }
  });
  $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": '{{ csrf_token() }}',
        },
    });
  const convertToSlug = (text) => {
    return text
      .replace(/ /g, '-')
      .replace(/[^\w-]+/g, '');
  }
</script>

@yield('script')