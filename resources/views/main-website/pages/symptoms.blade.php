@extends('main-website.parent')


@section('content')
<div class="sym pt-5 pb-5">
    <div class="container">
<div class="row">
    <div class="col-lg-6">
        <h2 class="fw-bold pb-3"> الأعراض </h2>
        <p class="text-black-50 lh-lg">
            معظم العلامات والأعراض ليست بسبب السرطان، ولكن يمكن أن تسببها أشياء أخرى. إذا كانت لديك أي علامات وأعراض لا تزول أو
            تزداد سوءا، يجب أن ترى الطبيب لمعرفة سببها. إذا لم يكن السرطان هو السبب، فيمكن للطبيب المساعدة في معرفة السبب وعلاجه،
            إذا لزم الأمر.
        </p>
        <p class="text-black-50 lh-lg">
            على سبيل المثال، الغدد الليمفاوية جزء من جهاز المناعة في الجسم وتساعد على التقاط المواد الضارة فيه. والعقد الليمفاوية
            الطبيعية صغيرة جدا ويصعب العثور عليها، ولكن عندما يكون هناك عدوى أو التهاب أو سرطان، يمكن أن تصبح العقد أكبر. ويمكن أن
            تصبح تلك الموجودة بالقرب من سطح الجسم كبيرة بما يكفي لتشعر بها بأصابعك، ويمكن أن ينظر إلى بعضها على أنها تورم أو كتلة
            تحت الجلد.
        </p>
    </div>
    <div class="col-lg-6">
        <img class="w-100" src="{{ asset('main-assets/image/6.jpg') }}" alt="صورة">
    </div>
</div>
        <h4 class="fw-bold pt-3 pb-3"> أعراض موضعية </h4>
        <p class="text-black-50 lh-lg pt-3">
            قد تحدث الأعراض المحلية بسبب كتلة الورم أو تقرحه. على سبيل المثال، يمكن أن تؤدي التأثيرات الجماعية لسرطان الرئة إلى سد
            الشعب الهوائية مما يؤدي إلى السعال أو الالتهاب الرئوي ويمكن أن يسبب التقرح نزيفًا يمكن أن يؤدي إلى أعراض مثل سعال الدم
            (سرطان الرئة). يمكن أن يتسبب سرطان المريء في تضييق المريء، مما يجعل البلع صعبًا أو مؤلمًا ؛ وسرطان القولون والمستقيم قد
            يؤدي إلى تضييق أو انسداد في الأمعاء، مما يؤثر على عادات الأمعاء. قد تنتج كتل الثدي أو الخصيتين كتلًا يمكن ملاحظتها. أو
            فقر الدم أو نزيف المستقيم (سرطان القولون) أو الدم في البول (سرطان المثانة) أو نزيف مهبلي غير طبيعي (سرطان بطانة الرحم أو
            سرطان عنق الرحم). على الرغم من أن الألم الموضعي قد يحدث في السرطان المتقدم، إلا أن الورم الأولي عادة ما يكون غير مؤلم.
            يمكن أن تتسبب بعض السرطانات في تراكم السوائل داخل الصدر أو البطن.
        </p>
        <h4 class="fw-bold pt-3 pb-3"> أعراض عامة </h4>
        <p class="text-black-50 lh-lg pt-3">
            قد تحدث أعراض في الجسم كاستجابة لوجود للسرطان. قد يشمل ذلك التعب أو فقدان الوزن أو تغيرات الجلد. يمكن أن تسبب بعض أنواع
            السرطان حالة التهابية جهازية تؤدي إلى فقدان العضلات وضعفها المستمر، والمعروفة باسم متلازمة الهزال. بعض أنواع السرطان مثل
            مرض هودجكين، وسرطان الدم وسرطانات الكبد أو الكلى يمكن أن تسبب حمى مستمرة.

            تحدث بعض الأعراض الجهازية للسرطان بسبب الهرمونات أو الجزيئات الأخرى التي ينتجها الورم، والمعروفة باسم متلازمات الأباعد
            الورمية. تشمل متلازمات الأباعد الورمية الشائعة فرط كالسيوم الدم الذي يمكن أن يسبب تغير الحالة العقلية، والإمساك والجفاف،
            أو نقص صوديوم الدم الذي يمكن أن يسبب أيضًا تغيرًا في الحالة العقلية أو القيء أو الصداع أو النوبات.
        </p>
        <h4 class="fw-bold pt-3 pb-3"> أعراض الانبثاث </h4>
        <p class="text-black-50 lh-lg pt-3">
            يمكن أن ينتشر السرطان من موقعه الأصلي عن طريق الانتشار المحلي، والانتشار اللمفاوي إلى العقد الليمفاوية الإقليمية أو عن
            طريق الانتشار الدموي عبر الدم إلى مواقع بعيدة، تعرف باسم الإنبثاث. عندما ينتشر السرطان عبر الدم، قد ينتشر عبر الجسم ولكن
            من المرجح أن ينتقل إلى مناطق معينة اعتمادًا على نوع السرطان تعتمد أعراض سرطانات النقائل على مكان الورم ويمكن أن تشمل
            تضخم الغدد الليمفاوية (التي يمكن الشعور بها أو رؤيتها تحت الجلد أحيانًا وتكون صلبة عادةً) أو تضخم الكبد أو تضخم الطحال،
            والتي يمكن الشعور بها في البطن أو الألم أو الكسر من العظام والأعراض العصبية المصابة.
        </p>
    </div>
</div>

@endsection