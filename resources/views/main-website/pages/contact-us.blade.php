@extends('main-website.parent')

{{-- @section('css')
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
@endsection --}}
@section('content')
    <div class="connectUS pt-5 pb-5">
        <div class="container">
            <h2 class="fw-bold pt-3 pb-3"> تواصل معنا </h2>
            <form action="" id="kt_modal_add_user_form">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" id="name" placeholder="الاسم" class="w-100 mb-5" required>
                        <input type="email" id="email" placeholder="البريد الإلكتروني" class="w-100 mb-5" required>
                        <input type="number" id="phone_number" placeholder="رقم الهاتف" class="w-100 mb-5" required>
                        <textarea name="Message" id="message" cols="30" rows="10" class="w-100 mb-3" placeholder="أكتب رسالة"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn" id="submit-btn" onclick="performStore()" type="submit">ارسل<i
                                class="fa-regular fa-paper-plane pe-3"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function performStore() {
            let data = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone_number: document.getElementById('phone_number').value,
                message: document.getElementById('message').value,
            }
            let url = '{{ route('contact.store') }}'

            //post(url, data, buttonId, redirectTo, formId)
            post(url, data, 'submit-btn', '{{ route('contact') }}', 'kt_modal_add_user_form')
        }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
@endsection
