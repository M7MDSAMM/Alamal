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
                        <h2>Add New Patient</h2>
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
                                            <label for="type" class="form-label">File Type</label>
                                            <input type="text" class="form-control" id="type" name="type"
                                                required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="patient_file" class="form-label">Patient File</label>
                                            <input type="file" class="form-control" id="patient_file" name="patient_file"
                                                accept=".pdf, .doc, .docx, .txt" required>
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
            if (document.getElementById('patient_file').files.length > 0) {
                formData.append('patient_file', document.getElementById('patient_file').files[0]);
            }
            formData.append('type', document.getElementById('type').value);
            formData.append('patient_id', document.getElementById('patient').value);
            let url = '{{ route('files.store') }}';
            // console.log(formData);
            post(url, formData, 'submit-btn', '{{ route('files.create') }}');
        }
    </script>

@endsection
