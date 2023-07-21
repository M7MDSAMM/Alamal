@extends('dashboard.parent')
@section('title', 'Add New Doctor')

@section('styles')

@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">

            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl" style="max-width: 1800px">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <h2>Add New Patient Appointment</h2>
                    </div>
                    <div class="card-toolbar">

                        <div class="card-body py-4 table-responsive">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="patient" class="form-label">Patient</label>
                                            <select class="form-select" id="patient" name="patient" required>
                                                <option value="">Select Patient</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Appoinment Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="time" class="form-label">Appoinment Time</label>
                                            <input type="time" class="form-control" id="time" name="time"
                                                required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="reason" class="form-label">Appoinment Reason</label>
                                            <input type="text" class="form-control" id="reason" name="reason">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" onclick="performCreate()" id="submit-btn"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

@endsection

@section('scripts')

    <script>
        function performCreate() {
            let formData = new FormData();
            formData.append('reason', document.getElementById('reason').value);
            formData.append('appoinment_date', document.getElementById('date').value);
            formData.append('appoinment_time', document.getElementById('time').value);
            formData.append('patient_id', document.getElementById('patient').value);
            let url = '{{ route('appoinments.store') }}';
            // console.log(formData);
            post(url, formData, 'submit-btn', '{{ route('appoinments.create') }}');
        }
    </script>

@endsection
