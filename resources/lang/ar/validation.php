<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => ':attribute لا يُمثّل رابطًا صحيحًا.',
    'after' => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط.',
    'array' => 'يجب أن يكون :attribute ًمصفوفة.',
    'attached' => ':attribute تم إرفاقه بالفعل.',
    'before' => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max.',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false .',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'date' => ':attribute ليس تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون :attribute مطابقاً للتاريخ :date.',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'exists' => 'القيمة المحددة :attribute غير موجودة.',
    'file' => 'الـ :attribute يجب أن يكون ملفا.',
    'filled' => ':attribute إجباري.',
    'gt' => [
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'string' => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا.',
    ],
    'image' => 'يجب أن يكون :attribute صورةً.',
    'in' => ':attribute غير موجود.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون :attribute نصًا من نوع JSON.',
    'lt' => [
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'string' => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرفًا.',
    ],
    'max' => [
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا.',
    ],
    'multiple_of' => ':attribute يجب أن يكون من مضاعفات :value',
    'not_in' => 'العنصر :attribute غير صحيح.',
    'not_regex' => 'صيغة :attribute غير صحيحة.',
    'numeric' => 'يجب على :attribute أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب تقديم :attribute.',
    'prohibited' => ':attribute محظور.',
    'prohibited_if' => ':attribute محظور إذا كان :other هو :value.',
    'prohibited_unless' => ':attribute محظور ما لم يكن :other ضمن :values.',
    'regex' => 'صيغة :attribute .غير صحيحة.',
    'relatable' => ':attribute قد لا يكون مرتبطا بالمصدر المحدد.',
    'required' => ':attribute مطلوب.',
    'required_if' => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all' => ':attribute مطلوب إذا توفّر :values.',
    'required_without' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط.',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ :attribute.',
    'url' => 'صيغة الرابط :attribute غير صحيحة.',
    'uuid' => ':attribute يجب أن يكون بصيغة UUID سليمة.',
    'full_name' => 'يجب ادخال الاسم الثلاثى',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],

        'combination_price.*' => [
            'required' => 'تأكد من ادخال اسعار الدمج',
        ],

        'combination_qty.*' => [
            'required' => 'تأكد من ادخال كميات الدمج',
        ],
        'options.*.option' => [
            'required' => 'تأكد من ادخال خيارات المنتج',
        ],
        'combination_values' => [
            'required' => 'تأكد من ادخال قيم الخيارات (الدمج)',
        ],


        'product_quantity' => [
            'required' => 'يرجى ادخال الكمية',
            'numeric' => 'الكمية لا بد ان تكون رقم',
            'gt' => 'يرجى ادخال كمية صحيحة',
            'integer' => 'الكمية لا بد ان رقم صحيح'
        ],

        'quantity' => [
            'required' => 'يرجى ادخال الكمية',
            'numeric' => 'الكمية لا بد ان تكون رقم',
            'gt' => 'يرجى ادخال كمية صحيحة',
            'integer' => 'الكمية لا بد ان رقم صحيح'

        ],


        //********************** front **/////////////////////////////////////////////

        'first_name' => [
            'required' => 'يرجى ادخال الاسم الاول',
            'min' => ' الاسم الاول مكون من 3 حروف على الاقل',
        ],
        'last_name' => [
            'required' => 'يرجى ادخال الاسم الاخير',
            'min' => ' الاسم الاخير مكون من 3 حروف على الاقل',
        ],
        'email' => [
            'required' => 'يرجى ادخال الايميل',
            'exists' => 'هذا الايميل غير مسجل ',
            'email' => 'يرجى ادخال ايميل صحيح',
            'unique' => 'البريد الالكترونى مسجل بالفعل'
        ],
        'phone' => [
            'required' => 'يرجى ادخال رقم الهاتف',
            'min' => 'يرجى ادخال رقم هاتف مكون من :min رقم',
            'regex' => 'يرجى ادخال رقم هاتف صحيح',
            'max' => 'يرجى ادخال رقم هاتف مكون من :max رقم',
            'unique' => 'رقم الهاتف مسجل بالفعل',
            'digits' => 'يرجى ادخال رقم هاتف مكون من :digits رقم'
        ],
        'country_id' => [
            'required' => 'يرجى اختيار الدولة',
        ],

        'government_id' => [
            'required' => 'يرجى اختيار المحافظة',
        ],
        'gender' => [
            'required' => 'يرجى اختيار النوع',
        ],

        'city_id' => [
            'required' => 'يرجى اختيار المدينة ',
        ],
        'zone_id' => [
            'required' => 'يرجى اختيار المنطقة',
        ],
        'old_password' => [
            'required' => 'يرجى ادخال كلمة المرور القديمة',
        ],
        'password' => [
            'required' => 'يرجى ادخال كلمة المرور ',
            'confirmed' => " كلمة المرور غير متطابقة",
            'min' => "يرجى ادخال 6 حروف على الاقل فى كلمة المرور ",
            'same' => "كلمة المرور غير متطابقة ",

        ],

        'stars' => [
            'required' => 'يرجى اختيار التقييم',
        ],
        'name' => [
            'required' => 'يرجى  ادخال الاسم',
            'min' => 'يرجى ادخال 3 حروف على الاقل للاسم ',

        ],

        'review' => [
            'required' => 'يرجى ادخال تقييمك',
        ],
        'message' => [
            'required' => 'يرجى ادخال الرسالة',
        ],


        'code' => [
            'required' => 'يرجى ادخال الكود',
            'unique' => 'هذا الكود موجود مسبقا !',
        ],
        'max_num_of_use' => [
            'required' => 'يرجى ادخال اقصى عدد لاستخدام الكود',
            'numeric' => 'يرجى ادخال ارقام فقط ',
        ],
        'min_total' => [
            'required' => 'يرجى ادخال اقل قيمة للسلة',
            'numeric' => 'يرجى ادخال ارقام فقط',
        ],
        'from' => [
            'required' => 'يرجى ادخال تاريخ البداية',
            'date' => 'تاريخ البداية لابد ان يكون تاريخ صحيح ',
        ],
        'to' => [
            'required' => 'يرجى ادخال تاريخ الانتهاء',
            'date' => 'تاريخ الانتهاء لابد ان يكون تاريخ صحيح ',
            'after' => 'تاريخ الانتهاء لابد ان يكون اكبر من تاريخ البداية',
        ],
        'voucher_type' => [
            'required' => 'يرجى اختيار نوع الخصم',
        ],
        'status' => [
            'required' => 'يرجى اختيار الحالة',
        ],
        'amount' => [
            'numeric' => 'يرجى ادخال مبلغ صحيح',
        ],
        'percentage' => [
            'numeric' => 'يرجى ادخال نسبة صحيحية',
        ],

        'name_ar' => [
            'required' => 'يرجى ادخال الاسم بالعربية',
        ],
        'name_en' => [
            'required' => 'يرجى ادخال الاسم بالانجليزية',
        ],
        'desc_ar' => [
            'required' => 'يرجى ادخال التفاصيل بالعربية',
        ],
        'desc_en' => [
            'required' => 'يرجى ادخال التفاصيل بالانجليزية',
        ],
        'start_date' => [
            'required' => 'يرجى ادخال تاريخ البداية',
            'date' => 'تاريخ البداية لابد ان يكون تاريخ صحيح ',
        ],
        'end_date' => [
            'required' => 'يرجى ادخال تاريخ الانتهاء',
            'date' => 'تاريخ الانتهاء لابد ان يكون تاريخ صحيح ',
            'after' => 'تاريخ الانتهاء لابد ان يكون اكبر من تاريخ البداية',
        ],
        'type' => [
            'required' => 'يرجى اختيار النوع',
        ],
        'value' => [
            'required' => 'يرجى ادخال القيمة',
            'numeric' => 'يرجى ادخال قيمة صحيحة',
            'required_if' => __('warrantymodule::warranty.value') . ' مطلوب في حال ما إذا كان يشمل الضمان'
        ],
        'photo' => [
            'required' => 'يرجى اختيار الصورة',
            'image' => 'jpeg,png,jpg,gif يرجى اختيار صورة بامتداد ',
        ],
        'offer_products' => [
            'required' => 'يرجى اختيار منتجات العرض',
        ],
        'url' => [
            'required' => 'يرجى ادخال اللينك',
        ],
        'author' => [
            'required' => 'يرجى ادخال المؤلف',
        ],
        'keys_en' => [
            'required' => 'يرجى ادخال المفتاح بالانجليزية',
        ],
        'keys_ar' => [
            'required' => 'يرجى ادخال المفتاح بالعربية',
        ],
        'script_header' => [
            'required' => 'يرجى ادخال اسكريبت الهيدر',
        ],
        'script_footer' => [
            'required' => 'يرجى ادخال اسكريبت الفوتر',
        ],

        'shipping_price' => [
            'required' => 'يرجى ادخال قيمة الشحن',
            'numeric' => 'يرجى ادخال قيمة صحيحة',
        ],


        'discount.*.discount_quantity' => [
            'required' => 'يرجى ادخال كمية الخصم',
        ],

        'discount.*.discount_type' => [
            'required' => 'يرجى اختيار نوع الخصم',
        ],

        'discount.*.discount_value' => [
            'required' => 'يرجى ادخال قيمة الخصم',
            'numeric' => 'يرجى ادخال قيمة صحيحة لقيمة الخصم',
        ],

        'discount.*.end_date' => [
            'required_unless' => 'يرجى ادخال تاريخ الانتهاء',
            'after_or_equal' => 'تاريخ الانتهاء لابد ان يكون اكبر من تاريخ البداية'
        ],

        'discount.*.start_date' => [
            'required_unless' => 'يرجى ادخال تاريخ البداية',
        ],

        'product_photo' => [
            'required' => 'يرجى اختيار صورة المنتج',
            'image' => 'jpeg,png,jpg,gif يرجى اختيار صورة بامتداد  ',
        ],

        'product_price' => [
            'required' => 'يرجى ادخال سعر المنتج',
            'numeric' => 'يرجى ادخال قيمة صحيحة لسعر المنتج',

        ],

        'product_code' => [
            'required' => 'يرجى ادخال كود المنتج',
        ],
        'parent_id' => [
            'required' => 'يرجى اختيار القسم',
        ],


        'product_images.*' => [
            'required' => 'يرجى اختيار صور المنتج',
            'image' => 'jpeg,png,jpg,gif يرجى اختيار صور المنتج بامتداد ',
        ],

        'attributes.*.attribute_id' => [
            'required' => 'يرجى اختيار الخاصية ',
        ],
        'attributes.*.attribute_value' => [
            'required' => 'يرجى اختيار قيمة الخاصية ',
        ],

        'reasons.*' => [
            'required' => 'يرجى اختيار سبب الارجاع',
        ],

        'user_address_id' => [
            'required' => 'يرجى اختيار العنوان',
        ],

        'reason' => [
            'required_if' => 'السبب مطلوب في حال ما إذا كان لا يشمل الضمان'
        ],

        'store_reason' => [
            'required_without' => 'السبب مطلوب في حال ما إذا كان الضمان معلق'
        ],

        'application_number' => [
            'required_if' => __('warrantymodule::warranty.application_number') . ' مطلوب في حال ما إذا كان يشمل الضمان'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address' => 'العنوان',
        'attach' => 'المرفقات',
        'reply' => 'الرد',
        'age' => 'العمر',
        'available' => 'مُتاح',
        'city' => 'المدينة',
        'content' => 'المُحتوى',
        'country' => 'الدولة',
        'date' => 'التاريخ',
        'day' => 'اليوم',
        'description' => 'الوصف',
        'email' => 'البريد الالكتروني',
        'excerpt' => 'المُلخص',
        'first_name' => 'الاسم الأول',
        'gender' => 'النوع',
        'hour' => 'ساعة',
        'last_name' => 'اسم العائلة',
        'minute' => 'دقيقة',
        'mobile' => 'الجوال',
        'month' => 'الشهر',
        'name' => 'الاسم',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'phone' => 'الهاتف',
        'second' => 'ثانية',
        'sex' => 'الجنس',
        'size' => 'الحجم',
        'time' => 'الوقت',
        'title' => 'العنوان',
        'username' => 'اسم المُستخدم',
        'year' => 'السنة',
        'image_ar' => 'الصورة العربى',
        'image_en' => 'الصورة الانجليزى',
        'front_image' => __('warrantymodule::warranty.front_image'),
        'back_image' => __('warrantymodule::warranty.back_image'),
        'warranty_image' => __('warrantymodule::warranty.warranty_image'),
        'warranty_number' => __('warrantymodule::warranty.warranty_number'),
        'usage_date' => __('warrantymodule::warranty.usage_date'),
        'user_notes' => __('warrantymodule::warranty.user_notes'),
        'dummy_text_1' => __('warrantymodule::warranty.dummy_text_1'),
        'dummy_text_2' => __('warrantymodule::warranty.dummy_text_2'),
        'dummy_text_3' => __('warrantymodule::warranty.dummy_text_3'),

        'user_name' => __('warrantymodule::warranty.user_name'),
        'install_date' => __('warrantymodule::insurance.install_date'),
        'shop_name' => __('warrantymodule::insurance.shop_name'),
        'dummy_text' => __('warrantymodule::insurance.dummy_text'),
        'device_front' => __('warrantymodule::insurance.device_front'),
        'device_back' => __('warrantymodule::insurance.device_back'),
        'card_attach' => __('warrantymodule::insurance.card_attach'),
        'qr_code_attach' => __('warrantymodule::insurance.qr_code_attach'),
        'qr_code_text' => __('warrantymodule::insurance.qr_code_text'),
        'dummy_attach' => __('warrantymodule::insurance.dummy_attach'),
        'application_number' => __('warrantymodule::warranty.application_number'),
    ],

];
