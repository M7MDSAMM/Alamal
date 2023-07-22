@extends('users.parent')
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
                        <h2>Request New Urgent Appoinment</h2>
                    </div>
                    <div class="card-toolbar">

                        <div class="card-body py-4 table-responsive">
                            <form>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Appoinment Reason</label>
                                            <textarea class="form-control" id="message" name="message" required></textarea>

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Appoinment Reason</label>
                                            <input type="file" class="form-control" id="file" name="file"
                                                required>
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
            // console.log(document.getElementById('message').value)
            let formData = new FormData();

            formData.append('message', document.getElementById('message').value);
            if (document.getElementById('file').files.length > 0) {
                formData.append('file', document.getElementById('file').files[0]);
            }
            let url = '{{ route('users.consultations.store') }}';
            // console.log(formData);
            post(url, formData, 'submit-btn', '{{ route('users.consultations') }}');
        }
    </script>

@endsection
