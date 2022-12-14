<div class="container mb-4">
  @foreach($product as $value)
  <form>
    @csrf
    <input type="hidden" value="{{ $value->product_id }}" class="cart_id_{{ $value->product_id }}">
    <input type="hidden" value="{{ $value->product_name }}" class="cart_name_{{ $value->product_id }}">
    <input type="hidden" value="{{ $value->product_images }}" class="cart_images_{{ $value->product_id }}">
    <input type="hidden" value="{{ $value->product_sales }}" class="cart_price_{{ $value->product_id }}">
    <input type="hidden" value="1" class="cart_qty_{{ $value->product_id }}">
    <input type="hidden" value="1" class="status_{{ $value->product_id }}">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb sub__nav bg-none mb-0">
            <li class="breadcrumb-item rounded-circle">
              <a href="#" class="icon__home"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item active icon__home--active">
              <i class="fal fa-angle-right"></i>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ $value->product_name }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- end .row sub__nav -->
    <div class="row ">
      <div class="col-md-9 mb-3">

        <div class="row bg-white rounded ml-0">

          <div class="col-md-5">
            <div class="gallerys pl-3 pr-3">
              <div class="gallery__view ">
                <img src="{{ asset ('Backend/uploads/products/'.$value->product_images) }}" alt="" id="js-view-image">
              </div>
              <div class="gallery__nav d-flex mb-3 pb-3">
                @foreach ($gallery as $images )
                <div class="image__item js-active-view active"
                     data-src="{{ asset ('Backend/uploads/products/'.$images->gallery_image) }}" data-toggle="modal">
                  <img src="{{ asset ('Backend/uploads/products/'.$images->gallery_image) }}" alt="">
                </div>
                @endforeach
              </div>
              <!-- end gallery__nav -->
              <div class="short__desc p-2 mb-3">
                {!! $value->product_desc !!}

              </div>
            </div>
          </div>
          <!-- end col5 -->
          <div class="col-md-7 pr-3">
            <div class="product__info pt-4">
              <div class="product__name ">
                {{ $value->product_name }}
              </div>
              <div class="product__brand">
                Th????ng hi???u: <a href="#"> {{ $value->brand_name }}</a> | SKU: 1702783
              </div>
              <div class="product__price new__price">
                <strong class="">{{ number_format($value->product_sales,0,',','.') }} ???</strong>
              </div>
              @if ($value->product_price - $value->product_sales == 0)
              @else
              <div class="product__price old__price pb-3 mb-3">
                <span class="">{{ number_format($value->product_price,0,',','.') }} ???</span>
                <i class="discount"> -{{ round(100 - ($value->product_sales * 100) / $value->product_price, 1) }}%</i>
              </div>
              @endif
              <div class="attached__promotion">
                <div class="title font-weight-bold mb-2">Ch???n th??m 1 trong nh???ng khuy???n m??i sau</div>
                <div class="gifts">
                  <div class="gift check d-flex p-3 mb-3 js-check-gift">
                    <div class="gift__icon"><i class="fas fa-gifts"></i></div>
                    <div class="gift__content">
                      <span>Gi???m gi??</span>
                      <p class="mb-0">Gi???m gi?? tr???c ti???p <span>800.000 ???</span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-block mb-3">
                <button type="button" class="btn btn-primary add-to-cart" data-id="{{ $value->product_id }}"
                        name="add-to-cart">Th??m v??o gi??? h??ng</button>
                {{-- <button class="border btn btn-none  "> Th??m v??o gi??? h??ng</button> --}}
              </div>

              <!-- <div class="related_promotion">
                <div class="title">
                  Khuy???n m??i li??n quan
                </div>
                <div class="promotion__content">
                  
                </div>
              </div> -->
            </div>
          </div>

        </div>
        <!-- end row -->

      </div>
      <div class="col-md-3 mb-3">
        <div class="other__services p-3 ">
          <div class="freeship pb-3 mb-3">
            <i class="fad fa-shipping-fast"></i>
            S???n ph???m ???????c mi???n ph?? giao h??ng
          </div>
          <div class="sale__policy mb-3">
            <div class="title mb-2">Ch??nh s???c b??n h??ng</div>
            <div class="policy__option">
              <i class="fal fa-shield-check"></i>
              Cam k???t h??ng ch??nh h??ng
            </div>
            <div class="policy__option">
              <i class="far fa-repeat-1"></i>
              ?????i tr??? trong v??ng 10 ng??y
            </div>
            <div class="policy__option">
              <i class="fal fa-truck-container"></i>
              Mi???n ph?? ship cho ????n tr??n 800k
            </div>
          </div>
          <div class="services">
            <div class="title mb-2">D???ch v??? kh??c</div>
            <div class="services__option">
              <i class="fal fa-cogs"></i>
              S???a ch???a ?????ng gi?? 150.000??
            </div>
            <div class="services__option">
              <i class="fal fa-laptop"></i>
              V??? sinh m??y laptop
            </div>
            <div class="services__option">
              <i class="fal fa-shield-check"></i>
              B???o h??nh t???i nh??
            </div>
            <a href="">Xem chi ti???t</a>
          </div>
        </div>
      </div>

      <div class="col-md-12 mb-3">
        <div class="bg-white rounded">
          <div class="row ">
            <div class="col-md-8">
              <div class="title">
                <h3 class="text--title m-0 ml-3">M?? t??? s???n ph???m</h3>
              </div>
              <div class="product__desc p-3">
                <article class="article">

                  {!! $value->product_content !!}
                </article>
                <p class="read-more js-read-more">?????c th??m <i class="fas fa-caret-down"></i></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="title">
                <h3 class="text--title m-0 ml-3">Th??ng s??? k??? thu???t</h3>
              </div>
              <div class="specifications p-3">
                <div class="specifications__item">
                  <div class="specifications__name">
                    Th????ng hi???u
                  </div>
                  <div class="specifications__value">
                    HP
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    B???o h??nh
                  </div>
                  <div class="specifications__value">
                    12 th??ng
                  </div>
                </div>
                <div class="specifications__title">
                  Th??ng tin chung
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__title">
                  C???u h??nh chi ti???t
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
                <div class="specifications__item">
                  <div class="specifications__name">
                    Series laptop
                  </div>
                  <div class="specifications__value">
                    Pavilion
                  </div>
                </div>
              </div>
              <p class="read-more read__specifications js-show-modal-specifications" data-toggle="modal">?????c th??m <i
                   class="fas fa-caret-down"></i></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="same__brand rounded">
          <div class="title">
            <h3 class="text--title m-0 ml-3">C??ng th????ng hi???u {{ $value->brand_name }} </h3>
            <a class="see-more" href="#">Xem t???t c??? <i class="fal fa-angle-right"></i></a>
          </div>
          <div class="owl-carousel owl-theme product__carousel--same-brand js-product-carousel" id="js-same-brand">
            <div class="item">
              <div class="products">
                @foreach ($releted as $value )
                <a class="product p-3 d-flex flex-column mb-3" href="">
                  <div class="product__image">
                    <figure class="box__image ">
                      <img class="lazyload zoom banner__image "
                           data-src="{{ asset ('Backend/uploads/products/'.$value->product_images) }}" alt=" "
                           loading="lazy">
                    </figure>
                    @if($value->product_price - $value->product_sales == 0)
                    @else
                    <div class="boxed__save shadow-sm rounded p-2">
                      <div class="text__save"> TI???T KI???M </div>
                      <div class="price_save">
                        {{ number_format(($value->product_price - $value->product_sales),0,',','.') }} ???
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="product__content d-flex flex-column justify-content-between">
                    <div class="product__top">
                      <div class="product__name">
                        {{ $value->product_name }}
                      </div>
                      <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                    </div>
                    <div class="product__bottom">
                      <div class="product__price new__price">
                        <strong class="">{{ number_format($value->product_sales,0,',','.') }} ???</strong>
                        <i>Freeship</i>
                      </div>
                      @if($value->product_price - $value->product_sales)
                      @else
                      <div class="product__price old__price">
                        <span class="">{{ number_format($value->product_price,0,',','.') }} ???</span>
                        <i
                           class="discount">-{{ round(100 - ($value->product_sales * 100) / $value->product_price, 1) }}%</i>
                      </div>
                      @endif
                    </div>
                  </div>
                </a>
                @endforeach
              </div>
            </div>
            {{-- <div class="item">
            <div class="products">
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="products">
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
              <a class="product p-3 d-flex flex-column mb-3" href="">
                <div class="product__image">
                  <figure class="box__image ">
                    <img class="lazyload zoom banner__image " data-src="./images/product/unnamed (1).webp" alt=" "
                         loading="lazy">
                  </figure>
                  <div class="boxed__save shadow-sm rounded p-2">
                    <div class="text__save"> TI???T KI???M </div>
                    <div class="price_save">1.600.000 ???</div>
                  </div>
                </div>
                <div class="product__content d-flex flex-column justify-content-between">
                  <div class="product__top">
                    <div class="product__name">
                      Laptop ACER Swift 3 SF313-53-503A NX.A4JSV.002 ( 13.5" Quad HD (2K)/Intel Core i5-1135G7/8GB/512GB
                      SSD/Windows 10
                    </div>
                    <!-- <div class="product__number">
                        C??n 3 s???n ph???m
                      </div> -->
                  </div>
                  <div class="product__bottom">
                    <div class="product__price new__price">
                      <strong class="">20.390.000 ???</strong>
                      <i>Freeship</i>
                    </div>
                    <div class="product__price old__price">
                      <span class="">21.990.000 ???</span>
                      <i class="discount">-7.28%</i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div> --}}
          </div>
        </div>
      </div>
    </div>
  </form>
  @endforeach
  <div class="modal fade" id="js-view-gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div id="js-gallery-carousel" class="modal-carousel owl-carousel owl-theme">
            @foreach ($gallery as $images )
            <div class="item">
              <div class="">
                <img class="m-auto" width="500px"
                     src="{{ asset ('Backend/uploads/products/'.$images->gallery_image) }}"
                     alt="">
              </div>
            </div>
            @endforeach
          </div>
          <ul id='carousel-custom-dots' class='owl-dots'>
            @foreach ($gallery as $images )
            <li class='owl-dot'>
              <img class="m-auto" width="200px" src="{{ asset ('Backend/uploads/products/'.$images->gallery_image) }}"
                   alt="">
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <i class="far fa-times"></i>
    </button>
  </div>

  <div class="modal fade" id="js-show-modal-specifications" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="title">
            <h3 class="text--title m-0 ml-3 text-center">Th??ng s??? k??? thu???t</h3>
          </div>
          <div class="specifications p-3">
            <div class="specifications__item">
              <div class="specifications__name">
                Th????ng hi???u
              </div>
              <div class="specifications__value">
                HP
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                B???o h??nh
              </div>
              <div class="specifications__value">
                12 th??ng
              </div>
            </div>
            <div class="specifications__title">
              Th??ng tin chung
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__title">
              C???u h??nh chi ti???t
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
            <div class="specifications__item">
              <div class="specifications__name">
                Series laptop
              </div>
              <div class="specifications__value">
                Pavilion
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <i class="far fa-times"></i>
    </button>
  </div>
</div>