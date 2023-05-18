@extends('template.index')

@section('content')
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Single Product -->
                @forelse($data as $item)

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                    </div>
                    <div id="product-1" class="single-product">
                        <div class="part-1">
                            <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">{{$item->name}}</h3>
                            <h4 class="product-price">{{$item->price}}</h4>
                        </div>
                    </div>
                </div>

                @empty
                @endforelse

            </div>

        </div>
    </section>
@endsection
