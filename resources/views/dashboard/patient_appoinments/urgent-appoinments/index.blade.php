@extends('dashboard.parent')
@section('title', 'Urgent Appoinments')

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
                            @foreach ($appoinments as $appoinment)
                                <div class="modal fade" id="kt_modal_edit_user_{{ $appoinment->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_edit_user_header_{{ $appoinment->id }}">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">Urgent Appoinment
                                                </h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                    data-kt-users-modal-action-{{ $appoinment->id }}="close">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="black" />
                                                            <rect x="7.41422" y="6" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(45 7.41422 6)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_edit_user_form_{{ $appoinment->id }}"
                                                    onsubmit="event.preventDefault(); updateAppoinment({{ $appoinment->id }})"
                                                    class="form" action="#">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                        id="kt_modal_edit_user_scroll_{{ $appoinment->id }}"
                                                        data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                        data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                        data-kt-scroll-offset="300px">


                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">Appoinment
                                                                Date</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="date" name="date"
                                                                id="date_{{ $appoinment->id }}"
                                                                class="form-control form-control-solid mb-3 mb-lg-0" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->

                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset"
                                                            onclick="refuseUrgent({{ $appoinment->id }})"
                                                            id="refuse-btn-{{ $appoinment->id }}"
                                                            class="btn btn-danger me-3">Refuse</button>
                                                        <button type="submit" id="submit-btn-{{ $appoinment->id }}"
                                                            class="btn btn-success"
                                                            onclick="updateAppoinment({{ $appoinment->id }})">
                                                            <span class="indicator-label">{{ __('admins.submit') }}</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                            @endforeach

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
                                    <th class="min-w-125px">Appoinment Reason</th>
                                    <th class="min-w-125px">Appoinment Status</th>
                                    @if(auth()->user()->type != 'doctor')
                                    <th class="min-w-125px">Doctor</th>
                                    @endif
                                    <th class="min-w-125px">Patient</th>
                                    <th class="min-w-125px">Requested At</th>
                                    <th class="min-w-125px">Actions</th>
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
                                                {{ $appoinment->reason }}
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <td>
                                            @if ($appoinment->status == 'pending')
                                                <div class="action-label">
                                                    <span class="badge badge-warning">{{ $appoinment->status }}</span>
                                                </div>
                                            @elseif($appoinment->status == 'accepted')
                                                <div class="action-label">
                                                    <span class="badge badge-success">{{ $appoinment->status }}</span>
                                                </div>
                                            @else
                                                <div class="action-label">
                                                    <span class="badge badge-danger">{{ $appoinment->status }}</span>
                                                </div>
                                            @endif


                                        </td>
                                        @if (auth()->user()->type != 'doctor')
                                            <td>{{ $appoinment->doctor->name }}</td>
                                        @endif
                                        <td>{{ $appoinment->patient->name }}</td>

                                        <!--begin::Joined-->

                                        <td>{{ $appoinment->created_at->format('Y-m-d h:i a') }}</td>
                                        <!--begin::Joined-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">{{ __('admins.actions') }}
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit_user_{{ $appoinment->id }}"
                                                        class="menu-link px-3">{{ __('admins.actions_edit') }}</a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--end::Menu item-->
                                            </div>
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
    <script>
        function refuseUrgent(id) {
            let data = {

            }
            let url = `refuse/${id}`;

            put(url, data, `refuse-btn-${id}`, '{{ url()->current() }}');
        }

        function updateAppoinment(id) {
            let data = {
                date: document.getElementById(`date_${id}`).value,
            }
            console.log(data);
            let url = 'accept/' + id;
            put(url, data, `submit-btn-${id}`, '{{ url()->current() }}');
        }
    </script>

@endsection
