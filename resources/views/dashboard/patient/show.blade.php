@extends('dashboard.parent')

@section('title', $patient->name)

@section('styles')
    <style>
        .iframe {
            width: 100%;
            /* Make the iframe take the full width of its container */
            height: 70vh;
            /* Set the height of the iframe to 70% of the viewport height */
            border: none;
            /* Optional: Remove the iframe border */
        }

        /* Custom styles for the modal */
        .modal-dialog {
            max-width: 60%;
            /* Adjust the width as needed */
            margin: 1.75rem auto;
            /* Center the modal on the screen */
        }

        .modal-content {
            width: 100%;
            /* Make the modal content take the full width */
        }

        .modal-header {
            padding: 1rem 2rem;
            /* Add padding to the header for a better look */
        }

        .modal-body {
            padding: 2rem;
            /* Add padding to the body for a better look */
            max-height: 80vh;
            /* Limit the height of the body to 80% of the viewport height */
        }

        /* Optional: Customize other parts of the modal as needed */
    </style>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    {!! $patient->image_tag !!}
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $patient->name }}</a>
                                            <a href="#">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                            fill="#00A3FF" />
                                                        <path class="permanent"
                                                            d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                            fill="black" />
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $patient->email }}
                                            </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Actions-->
                                    <div class="d-flex my-4">
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        {{ __('admins.actions') }}</div>
                                                </div>
                                                <!--end::Heading-->

                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->

                        <!--begin::Navs-->
                    </div>
                </div>

                @foreach ($patient->files as $file)
                    <div class="modal fade" id="kt_modal_preview_{{ $file->id }}" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-1050px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Preview File</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon-->
                                        <span class="svg-icon svg-icon-1">
                                            <!-- SVG icon code -->
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-10 mx-xl-20 my-7">
                                    <!--begin::Iframe-->
                                    <iframe src="http://127.0.0.1:8000/{{ $file->file }}" class="iframe"></iframe>

                                    <!--end::Iframe-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                @endforeach
                <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Patient Details</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->

                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">{{ __('admins.id') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">{{ $patient->id }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">{{ __('admins.full_name') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">{{ $patient->name }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">{{ __('admins.email') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">{{ $patient->email }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">{{ __('admins.last_seen') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">
                                    @if ($patient->last_seen != null)
                                        {{ \Carbon\Carbon::parse($patient->last_seen)->diffForHumans() }}
                                    @else
                                        {{ app()->isLocale('en') ? 'Never Logged In' : 'لم يسجل دخول' }}
                                    @endif
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">{{ __('admins.join_date') }}</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span
                                    class="fw-bolder fs-6 text-gray-800">{{ $patient->created_at->format('Y-m-d h:i a') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                </div>

                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Patient Appoinments</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->

                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->

                    <div class="card-body p-9">
                        <!--begin::Row-->
                        @foreach ($patient->appoinments as $appoinment)
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label
                                    class="col-lg-4 fw-bold text-muted">{{ date('l', strtotime($appoinment->appointment_date)) }}</label>
                                <!--end::Label-->
                                <div class="col-lg-4">
                                    <label class="fw-bold text-dark">{{ $appoinment->appointment_date }}</label>

                                </div>
                                <div class="col-lg-4">
                                    <label class="fw-bold text-dark">{{ $appoinment->appointment_time }}</label>

                                </div>
                                <!--begin::Col-->
                                <!--end::Col-->
                            </div>
                        @endforeach

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                </div>

                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Patient Files</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->

                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->

                    <div class="card-body p-9">
                        <!--begin::Row-->
                        @foreach ($patient->files as $file)
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">{{ $file->type }}</label>
                                <!--end::Label-->
                                <div class="col-lg-4">
                                    <label class="fw-bold text-dark">{{ $file->created_at->diffforhumans() }}</label>

                                </div>
                                <!--begin::Col-->
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_preview_{{ $file->id }}">
                                        Show File
                                    </button>
                                </div>
                                <!--end::Col-->
                            </div>
                        @endforeach

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->
                        <!--begin::Row-->

                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                </div>




                <!--end::details View-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
@endsection
