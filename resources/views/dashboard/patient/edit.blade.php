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
                        <h2>Edit Patient</h2>
                    </div>
                    <div class="card-toolbar">

                        <div class="card-body py-4 table-responsive">
                            <form id="update">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{ $user->name }}"
                                                id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="text" class="form-control" id="age"
                                                value="{{ $user->age }}" name="age" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number"
                                                value="{{ $user->phone_number }}" name="phone_number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option @selected(true)>{{ $user->gender }}</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <input type="date" value="{{ $user->date_of_birth }}" class="form-control"
                                                id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doctor" class="form-label">Doctor</label>
                                            <select class="form-select" id="doctor" name="doctor" required>
                                                <option @selected($user->doctor_id == $user->doctor->id)  value="{{ $user->doctor_id }}">{{ $user->doctor->name }}</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="main_patient_file" class="form-label">Main Patient File</label>
                                            <input type="file"  class="form-control" id="main_patient_file"
                                                name="main_patient_file">
                                        </div>
                                        <div class="mb-3">
                                            <label for="section" class="form-label">Section</label>
                                            <select class="form-select" id="section" name="section" required>
                                                <option value="{{ $user->section }}" selected>{{ $user->section }}</option>
                                                <option value="unclassified">Unclassified</option>
                                                <option value="Oncology">Oncology</option>
                                                <option value="Radiation Oncology">Radiation Oncology</option>
                                                <option value="Surgical Oncology">Surgical Oncology</option>
                                                <option value="Pediatric Oncology">Pediatric Oncology</option>
                                                <option value="Hematology">Hematology</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="degrees_of_severity" class="form-label">Degrees of
                                                Severity</label>
                                            <select class="form-select" id="degrees_of_severity" name="degrees_of_severity"
                                                required>
                                                <option value="{{ $user->degrees_of_severity }}">{{ $user->degrees_of_severity }}</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Moderate">Moderate</option>
                                                <option value="Severe">Severe</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="diagnosis" class="form-label">Diagnosis</label>
                                            <input type="text" value="{{ $user->diagnosis }}" class="form-control" id="diagnosis" name="diagnosis"
                                                required>
                                        </div>


                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" onclick="performUpdate()" id="submit-btn"
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
        function performUpdate() {
            let formData = new FormData();
            formData.append('_method', 'PUT');

            if (document.getElementById('main_patient_file').files.length > 0) {
                formData.append('main_patient_file', document.getElementById('main_patient_file').files[0]);
            }

            formData.append('name', document.getElementById('name').value);
            formData.append('age', document.getElementById('age').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('date_of_birth', document.getElementById('date_of_birth').value);
            formData.append('doctor', document.getElementById('doctor').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('section', document.getElementById('section').value);
            formData.append('degrees_of_severity', document.getElementById('degrees_of_severity').value);
            formData.append('diagnosis', document.getElementById('diagnosis').value);
            let url = '{{ route('patients.update',$user->id) }}';
            // console.log(formData);
            post(url, formData, 'submit-btn', '{{ route('patients.edit',$user->id) }}');
        }
    </script>

@endsection
