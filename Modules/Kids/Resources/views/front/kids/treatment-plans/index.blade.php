@extends('front.layouts.app')

@section('title', 'الخطط العلاجية والجلاسات')

@section('content')
    <style>
        .choiceModel,
        .createModel {
            display: none;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 9;
        }

        .choiceModel .form,
        .createModel form {
            transform: scale(.8);
        }

        .model-body form .form-group label {
            text-align: right;
        }

        .btn-new-target {
            background: #834E9A;
            transition: 0.5s ease-in-out;
        }

        .btn-new-target:hover {
            color: black !important;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .dashboard-title h5 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <!-- Create Form Html -->
    @include('kids::front.kids.treatment-plans.partials.modals.create.createModel')
    @include('kids::front.kids.treatment-plans.partials.modals.create.model')
    <!-- Create Form Html -->

    <!--nav -->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
            </ol>
        </div>
    </nav>

    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('welcome') }}">
                        <i class="fa-solid fa-chevron-left"></i> لوحة
                        التحكم
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.show', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    الخطط العلاجية و الجلسات
                </li>
            </ol>
        </div>
    </nav>
    <!--nav -->

    <div class="user-dashboard-details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <a class="dashboard-card d-block choiceBtn">
                        <div class="dashboard-card-details text-center">
                            <div class="dashboard-img mb-2">
                                <img src="{{ asset('dist/front/assets/images/Plus.png') }}" alt="Add Goal"
                                    class="img-fluid" />
                            </div>
                            <div class="dashboard-title">
                                <h5>أضافة هدف</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.treatment-plans.goals.index', $kid->id) }}">
                        <div class="dashboard-card-details text-center">
                            <div class="dashboard-img mb-2">
                                <img src="{{ asset('dist/front/assets/images/Search.png') }}" alt="Under Training Goals"
                                    class="img-fluid" />
                            </div>
                            <div class="dashboard-title">
                                <h5>الأهداف تحت التدريب</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <a class="dashboard-card d-block"
                        href="{{ route('kids.treatment-plans.goals.accomplishedGoals.index', $kid->id) }}">
                        <div class="dashboard-card-details text-center">
                            <div class="dashboard-img mb-2">
                                <img src="{{ asset('dist/front/assets/images/checkmark.png') }}" alt="Accomplished Goals"
                                    class="img-fluid" />
                            </div>
                            <div class="dashboard-title">
                                <h5>الأهداف المنجزه</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Start Choice Model
        let choiceModel = document.querySelector(".choiceModel");
        let choiceBtn = document.querySelector('.choiceBtn');
        choiceBtn.addEventListener('click', function() {
            choiceModel.style.display = "block";
        })
        // End Choice Model

        // Start Create Model
        let storeBtn = document.querySelector(".storeBtn");
        let createModel = document.querySelector(".createModel");
        storeBtn.addEventListener('click', function() {

            $('#target').val('')
            $('#stimulus').val('')
            $('#task').val('')
            choiceModel.style.display = "none";
            createModel.style.display = "block";
        });
        // End Create Model 
    </script>
@endsection
