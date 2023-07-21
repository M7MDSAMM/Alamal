@extends('users.parent')
@section('title', 'Doctors')

@section('styles')


@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <form method="GET" class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-user-table-filter="search" value="{{ request()->search }}"
                                    name="search" class="form-control form-control-solid w-350px ps-14"
                                    placeholder="{{ __('admins.search') }}" />
                                @if (request()->search)
                                    <a href="{{ route('doctors.index') }}"
                                        class="btn btn-primary">{{ __('admins.clear') }}</a>
                                @endif
                            </form>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->

                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Modal - Add task-->


                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4 table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
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
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            {{ $appoinments->links() }}
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')

@endsection
