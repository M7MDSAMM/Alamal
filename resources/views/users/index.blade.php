@extends('users.parent')

@section('title', 'Home')

@section('styles')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">10</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">My Files</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->

                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 4-->
                        <!--begin::Card widget 5-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">6</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">My Medical Consultations</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->

                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 5-->
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">30</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">My Appointments

                                    </span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 me-xxl-7 pt-2">
                                    <div id="products-chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                        data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                {{-- <div class="d-flex flex-column content-justify-center">
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.best_selling') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            0</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.active') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            0</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Label-->
                                    <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Label-->
                                        <div class="text-gray-500 pe-1">{{ __('dashboard.inactive') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Stats-->
                                        <div class="ms-auto fw-boldest text-gray-700 min-w-70px text-end">
                                            0</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Label-->

                                </div> --}}
                                <!--end::Labels-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 4-->
                        <!--begin::Card widget 5-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1">7</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-bold fs-2">My Urgent Appoinments</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->

                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 5-->
                    </div>
                    <div class="col-xl-6 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">Next 5 Appointment</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed table-hover fs-6 gy-5" id="contact_table">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">#</th>
                                            <th class="min-w-125px">Appoinment Day</th>
                                            <th class="min-w-125px">Appoinment Date</th>
                                            <th class="min-w-125px">Appoinment Time</th>
                                            <th class="min-w-125px">Doctor</th>
                                            <th class="min-w-125px">Added At</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">
                                        @foreach ($appoinments as $appoinment)
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td>
                                                    {{ $loop->iteration + ((request()->page ?? 1) - 1) * 10 }}
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->

                                                    <!--end::Avatar-->
                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        {{ date('l', strtotime($appoinment->appointment_date)) }}
                                                    </div>
                                                    <!--begin::User details-->
                                                </td>
                                                <!--end::User=-->
                                                <td>{{ $appoinment->appointment_date }}</td>
                                                <td>{{ $appoinment->appointment_time }}</td>
                                                <td>{{ $appoinment->doctor->name }}</td>

                                                <!--begin::Joined-->

                                                <td>{{ $appoinment->created_at->format('Y-m-d h:i a') }}</td>
                                                <!--begin::Joined-->
                                                <!--begin::Action=-->

                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('dashboard-assets/js/widgets.bundle.js') }}"></script> --}}
    @include('users.js.index')

@endsection
