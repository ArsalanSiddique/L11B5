@extends('layouts.app')

@section('content')

<div class="row g-3 mb-3">
    <div class="col-xxl-6 col-lg-12">
        <div class="card h-100">
            <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <!--/.bg-holder-->
            <div class="card bg-transparent-50 overflow-hidden">
                <div class="card-header position-relative">
                    <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                    </div>
                    <!--/.bg-holder-->

                    <div class="position-relative z-index-2">
                        <div>
                            <h3 class="text-primary mb-1">Good Afternoon, {{ auth()->user()->name }}!</h3>
                            <p>Here’s what happening with your store today </p>
                        </div>
                        <div class="d-flex py-3">
                            <div class="pe-3">
                                <p class="text-600 fs--1 fw-medium">Today's visit </p>
                                <h4 class="text-800 mb-0">14,209</h4>
                            </div>
                            <div class="ps-3">
                                <p class="text-600 fs--1">Today’s total sales </p>
                                <h4 class="text-800 mb-0">$21,349.29 </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection