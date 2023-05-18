@extends('template.index')

@section('content')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
                    @if( isset($data))
                        {!! Form::model($data, ['route' => ['product-add.update', $data->id] , 'files' => true, 'medivod' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'product-add.store', 'files' => true]) !!}
                    @endif


                        <div class="form-row m-b-55">
                            <div class="name">SKU</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-12">
                                        <div class="input-group-desc">
                                            {{ Form::input ('product_sku', null, 1,['class' => "input--style-5", "name" => "product_sku"]) }}
                                            <label class="label--desc">SKU product</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    {{ Form::input ('product_name', null, 1, ['class' => "input--style-5", 'name' => "product_name"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Price</div>
                            <div class="value">
                                <div class="input-group">
                                    {{ Form::number ('product_price', null, ['class' => "input--style-5", 'name' => "product_name"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Type Product</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            {{ Form::select ('product_type',null,['placeholder' => 'choose product type', 'class' => "input--style-5", 'name' => "product_name"])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        {!! Form::text('') !!}
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
