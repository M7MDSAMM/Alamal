@extends('main-website.parent')


@section('content')
    <div class="landing">
        <div class="content text-center">
            <div class="col-lg-5">
                <div class="content-text p-3">
                    <h1 class="fw-bold "> عيــــــــــــادة الأمــــل </h1>
                    <p class="text-center"> السرطان هو السبب الرئيس الثاني للوفاة في العالم. لكن معدلات البقاء على قيد الحياة
                        تتحسن
                        لأنواع كثيرة من السرطان بفضل
                        التحسينات التي تشهدها طرق الكشف عن السرطان وعلاجه والوقاية منه. </p>
                </div>
            </div>
        </div>
    </div>
    <!--  landing نهاية-->
    <!-- classification-section   بداية -->
    <div class="classification-section pt-5 pb-5 text-light">
        <div class="container">
            <div class="classification">
                <div class="row text-center">
                    <div class="col-md-6 col-lg-4 bg" data-aos="fade-up" data-aos-delay="100">
                        <i class="fa-solid fa-disease fa-4x"></i>
                        <h4 class="mt-3 fw-bold"> سرطانة </h4>
                        <p class="lh-lg">
                            وهي سرطانات تنبع من النسيج الطلائي وتشكل أكبر مجموعة من السرطانات عامة.
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-4 bg" data-aos="fade-up" data-aos-delay="200">
                        <i class="fa-solid fa-bone fa-4x"></i>
                        <h4 class="mt-3 fw-bold"> ساركومة </h4>
                        <p class="lh-lg">
                            وهي سرطانات تنبع من النسيج الضام (أي العظام والغضاريف والدهون والأعصاب).
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-4 bg" data-aos="fade-up" data-aos-delay="300">
                        <i class="fa-solid fa-viruses fa-4x"></i>
                        <h4 class="mt-3 fw-bold"> ليمفوما والليوكيميا </h4>
                        <p class="lh-lg">
                            وهما سرطانان ينبعان من الخلايا المكونة للدم.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- classification-section  نهاية -->
    <div class="section3 text-center mt-5 pt-5 pb-5 mb-5">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <p class="fw-bold"> غير مصنف </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <p class="fw-bold"> علم الأورام </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <p class="fw-bold"> علاج الأورام بالإشعاع </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <p class="fw-bold"> جراحة الأورام </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <p class="fw-bold"> أورام الأطفال </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="700">
                    <p class="fw-bold"> أمراض الدم </p>
                </div>
            </div>
        </div>
    </div>
    <!-- بداية قسم حياة أفضل -->
    <div class="container">
        <div class="section1 pt-5 pb-5 mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="100"> لحياة أكثر صحية شاهد الفيديو </h3>
                    <P class="text-black-50 pt-3 lh-lg" data-aos="fade-up" data-aos-delay="200">
                        يؤدي اتباع أنماط الحياة الصحية والمواظبة عليها إلى فوائد عديدة تكون نتيجتها النهائية الوقاية من
                        الأمراض، وتعزيز الصحة
                        الجسدية والعقلية (الذهنية) والنفسية، وتحسين جودة الحياة بشكل عام.

                        للممارسات الصحية التي نقوم بها فوائد ملموسة عديدة بإمكانك التعرف عليها هنا.
                    </P>
                </div>
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe class="w-100" height="315" src="https://www.youtube.com/embed/bebWEHwPwjM"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- نهاية قسم حياة أفضل -->
    <!-- بداية نبذه عن السرطان  -->
    <div class="container">
        <div class="section1 pt-5 pb-5 mb-5">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img class="w-100 mb-3" src="{{ asset('main-assets/image/1.jpg') }}" alt="صورة">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="fw-bold"> نبذه عن المرض </h3>
                    <p class="text-black-50  lh-lg"> السرطان سبب رئيسي للوفاة في جميع أنحاء العالم، وقد أزهق أرواح 10 ملايين
                        شخص تقريباً في عام 2020، أو ما يعادل وفاة واحدة
                        تقريباً من كل 6 وفيات.
                        من أكثر أنواع السرطان شيوعاً سرطان الثدي وسرطان الرئة وسرطان القولون والمستقيم </p>
                    <p class="text-black-50 lh-lg">
                        وسرطان البروستات.
                        تُعزى حوالي ثلث الوفيات الناجمة عن السرطان إلى تعاطي التبغ، وارتفاع منسب كتلة الجسم، وتعاطي الكحول،
                        وانخفاض مدخول الجسم
                        من الفواكه والخضروات، وقلّة ممارسة النشاط البدني.
                    </p>
                    <div class="continue w-100">
                        <div class="cont">
                            <a href="about cancer.html"> قراءة المزيد... </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- نهاية نبذه عن السرطان -->
    <!--  بداية الإحصائيات  -->
    <div class="section3 text-center mt-5 pt-5 pb-5 mb-5">
        <div class="container">
            <h3 class="pt-5 fw-bold" data-aos="fade-up" data-aos-delay="100"> أكثر أنواع السرطان انتشاراً حسب إحصائيات سنة
                2020 </h3>
            <div class="row pt-5 pb-5">
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="fw-bold"> 2.26 </h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان الثدي </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <h1 class="fw-bold"> 2.21</h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان الرئة </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="fw-bold"> 1.93 </h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان القولون والمستقيم </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <h1 class="fw-bold"> 1.41 </h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان البروستات </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <h1 class="fw-bold"> 1.20 </h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان الجلد (غير الميلانوما) </p>
                </div>
                <div class="col-md-6 col-lg-2" data-aos="fade-up" data-aos-delay="700">
                    <h1 class="fw-bold"> 1.09 </h1>
                    <p> مليون حالة </p>
                    <p class="fw-bold"> سرطان المعدة</p>
                </div>
            </div>
        </div>
    </div>
    <!--  نهاية الإحصائيات  -->
    <div class="reasons pt-5 pb-5 mb-5">
        <div class="container">
            <div class="boxText w-100 d-flex justify-content-center text-center">
                <div class="col-lg-6 pb-5">
                    <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="100"> أسباب مرض السرطان </h3>
                    <p class="text-black-50 lh-lg" data-aos="fade-up" data-aos-delay="200">
                        ينشأ السرطان عن تحول خلايا عادية إلى أخرى ورمية في عملية متعدّدة المراحل تتطور عموماً من آفة سابقة
                        للتسرطن إلى ورم
                        خبيث.
                        وهذه التغيرات ناجمة عن التفاعل بين العوامل الوراثية للشخص وثلاث فئات من العوامل الخارجية، منها ما
                        يلي:
                    </p>
                </div>
            </div>
            <div class="row text-center pt-5" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-6 col-lg-4 p-3">
                    <i class="fa-regular fa-sun fa-4x"></i>
                    <h5 class="mt-3 fw-bold"> العوامل المادية المسرطنة</h5>
                    <p class="text-black-50 lh-lg">
                        مثل الأشعّة فوق البنفسجية والأشعّة المؤيّنة.
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 p-3" data-aos="fade-up" data-aos-delay="400">
                    <i class="fa-solid fa-flask-vial fa-4x"></i>
                    <h5 class="mt-3 fw-bold"> العوامل الكيميائية المسرطنة </h5>
                    <p class="text-black-50 lh-lg">
                        مثل الأسبستوس ومكوّنات دخان التبغ والكحول والأفلاتوكسين (أحد الملوّثات الغذائية) والزرنيخ (أحد
                        ملوّثات مياه الشرب).
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 p-3" data-aos="fade-up" data-aos-delay="500">
                    <i class="fa-solid fa-dna fa-4x"></i>
                    <h5 class="mt-3 fw-bold"> العوامل البيولوجية المسرطنة </h5>
                    <p class="text-black-50 lh-lg">
                        مثل الالتهابات الناجمة عن بعض الفيروسات أو البكتيريا أو الطفيليات.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- بداية سرطان الأطفال -->
    <div class="section3  pt-5 pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img class="w-100 mb-3" src="{{ asset('main-assets/image/2.jpg') }}" alt="صورة">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="fw-bold"> سرطان الأطفال </h3>
                    <p class="lh-lg text-light">
                        يمكن تعريف سرطان الأطفال (بالإنجليزية: Childhood Cancer) بأنه مجموعة من الاضطرابات والأمراض، وقد
                        يصيب الأطفال سرطان الدم
                        وأورام المخ، إضافة إلى الأورام في مناطق مختلفة من الجسم من الأنسجة أو العظام، ولحسن الحظ فإن غالبية
                        أنواع سرطان الأطفال
                        قابلة للعلاج، إذ إن معدل بقاء الأطفال المصابين بالسرطان على قيد الحياة أعلى منها لدى البالغين. يصيب
                        ما نسبته 1% من
                        السرطان الأطفال، لذا فإن سرطان الأطفال أقل شيوعاً من حالات السرطان لدى البالغين.
                    </p>
                    <p class="text-light lh-lg" data-aos="fade-up" data-aos-delay="300">
                        تصيب بعض أنواع السرطان الأطفال فقط ولا تصيب البالغين مثل سرطان الخلايا البدائية العصبية، وورم وليامز
                        (بالإنجليزية: Wilms
                        Tumor) التي تصيب كلى الأطفال، وعادة ما يتطلب علاج سرطان الأطفال علاجاً مختلفاً مقارنة بعلاج
                        البالغين.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- بداية سرطان الأطفال -->
    <!--  بداية التشخيص المبكر  -->
    <div class="section1 pt-5 pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="100"> التشخيص المبكّر </h3>
                    <p class="text-black-50 pt-3 lh-lg" data-aos="fade-up" data-aos-delay="300"> من المُرجّح عند الإبكار
                        في تشخيص السرطان أن يستجيب المُصاب به للعلاج، ويمكن أن يزيد احتمال بقائه على قيد الحياة ويقلّل
                        معدلات المراضة، وكذلك تكاليف علاجه الباهظ الثمن. ويمكن إدخال تحسينات كبيرة على حياة مرضى السرطان عن
                        طريق الكشف عن المرض
                        مبكّراً وتجنّب تأخير الرعاية. وفيما يلي المكونات الثلاثة للتشخيص المبكّر:
                    </p>
                    <p class="text-black-50 pt-3 lh-lg" data-aos="fade-up" data-aos-delay="400">
                        أن تكون على بيّنة من أعراض السرطان بمختلف أشكاله، ومن أهمية التماس المشورة الطبية عند ملاحظة نتائج
                        غير عادية؛
                        وإتاحة خدمات التقييم والتشخيص السريريين؛
                        وإحالة المريض في الوقت المناسب للحصول على خدمات العلاج.
                    </p>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img class="w-100" src="{{ asset('main-assets/image/3.jpg') }}" alt="صورة">
                </div>
            </div>
        </div>
    </div>
    <!--  نهاية التشخيص المبكر  -->
    <!--  بداية قسم الأطباء  -->
    <div class="doctor pt-5 pb-5">
        <div class="container">
            <div class="boxText w-100 d-flex justify-content-center text-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="fw-bold text-center"> أفضل أطباء السرطان حول العالم </h3>
                    <p class="text-black-50 text-center lh-lg">
                        السرطان هو المرض الذي ابتلي به العالم دون أي اختلافات. تزداد الحاجة إلى أطباء الأورام بشكل مطرد أكثر
                        من أي وقت
                        مضى.
                        كانت
                        هناك زيادة في النتائج الإيجابية لرعاية مرضى السرطان مما يحفز المزيد من الأفراد على الخروج والبحث عن
                        المزيد من
                        أطباء
                        الأورام
                    </p>
                </div>
            </div>
            <div class="row text-center pt-5 pb-5">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="imageDoctor">
                        <img class="rounded-circle" src="{{ asset('main-assets/image/doctor.jpg') }}" alt="صورة" width="150"
                            height="150">
                        <h4 class="pt-3"> د. كريستوفر وولفجانج </h4>
                        <p class="text-black-50 lh-lg">
                            هو مدير قسم جراحة الكبد والبنكرياس والجراحة الصفراوية والبنكرياس بجامعة نيويورك. من المعروف أنه
                            من بين أفضل أطباء أورام
                            سرطان البنكرياس في العالم
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="imageDoctor">
                        <img class="rounded-circle" src="{{ asset('main-assets/image/doctor1.jpg') }}" alt="صورة" width="150"
                            height="150">
                        <h4 class="pt-3"> د. فيليب سالم </h4>
                        <p class="text-black-50 lh-lg">
                            متخصّص في معالجة السرطان. سُجّلت له اكتشافات علميّة وأبحاث طليعيّة واختراعات أدوية في بيروت
                            وهيوستن (تكساس) حيث أدار
                            ورأس وأسّس مراكز في معالجة السرطان منذ العام 1987.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="imageDoctor">
                        <img class="rounded-circle" src="{{ asset('main-assets/image/doctor2.jpg') }}" alt="صورة" width="150"
                            height="150">
                        <h4 class="pt-3"> د. حسن غزال</h4>
                        <p class="text-black-50 lh-lg">
                            هو أحد أطباء الأورام وأمراض الدم الرائدين في دبي. في منطقته ، لديه أكثر من 25 عامًا من الخبرة.
                            تشمل مجالات خبرته زراعة
                            نخاع العظام وأمراض الدم وأورام الدم وغيرها.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="imageDoctor">
                        <img class="rounded-circle" src="{{ asset('main-assets/image/doctor3.jpg') }}" alt="صورة" width="150"
                            height="150">
                        <h4 class="pt-3"> د. ثيودور إم روس </h4>
                        <p class="text-black-50 lh-lg">
                            دكتوراه في الطب ، هو جراح القولون والمستقيم المعتمد من مجلس الإدارة والذي يعمل في كليفلاند كلينك
                            كندا. الدكتور روس متخصص
                            في أمراض الجهاز الهضمي
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- نهاية قسم الأطباء -->
    <!--  بداية قصتي مع السرطان  -->
    <div class="stories pt-5 pb-5 mb-5">
        <div class="container">
            <h3 class="fw-bold text-center" data-aos="fade-up" data-aos-delay="100"> قصتي مع السرطان </h3>
            <p class="text-black-50 text-center lh-lg"> قصص ملهمة لأشخاص تغلبوا على السرطان </p>
            <div class="row pt-5">
                <div class="col-sm- 12 col-md-6 col-lg-4"data-aos="fade-up" data-aos-delay="200">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZJqEllQq2X4"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-sm- 12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/VVlXGUNk7Ns"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-sm- 12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/gz2yrOnxLvU"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
