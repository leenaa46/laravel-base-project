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

    'accepted' => ':attribute must be accepted.',
    'accepted_if' => ':attribute must be accepted when :other is :value.',
    'active_url' => ':attribute is not a valid URL.',
    'after' => ':attribute ຕ້ອງເປັນວັນທີຫຼັງຈາກ :date.',
    'after_or_equal' => ':attribute ຕ້ອງເປັນວັນທີ after or equal to :date.',
    'alpha' => ':attribute must only contain letters.',
    'alpha_dash' => ':attribute ຈະຕ້ອງເປັນຕົວອັກສອນ, ຕົວເລກ ຫຼື ຂີດກ້ອງເທົ່ານັ້ນ.',
    'alpha_num' => ':attribute ຈະຕ້ອງເປັນຕົວອັກສອນ ຫຼື ຕົວເລກ.',
    'array' => ':attribute must be an array.',
    'before' => ':attribute ຕ້ອງເປັນວັນທີ before :date.',
    'before_or_equal' => ':attribute ຕ້ອງເປັນວັນທີ before or equal to :date.',
    'between' => [
        'numeric' => ':attribute ຕ້ອງຢູ່ລະຫວ່າງ :min ແລະ :max.',
        'file' => ':attribute ຕ້ອງຢູ່ລະຫວ່າງ :min ແລະ :max kilobytes.',
        'string' => ':attribute ຕ້ອງຢູ່ລະຫວ່າງ :min ແລະ :max characters.',
        'array' => ':attribute must have between :min ແລະ :max items.',
    ],
    'boolean' => ':attribute field must be true or false.',
    'confirmed' => ':attribute ບໍ່ກົງກັບຕົ້ນແບບ.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute is not a valid date.',
    'date_equals' => ':attribute ຕ້ອງເປັນວັນທີ equal to :date.',
    'date_format' => ':attribute does not match the format :format.',
    'date_in_month' => ':attribute ດັ່ງກ່າວບໍ່ໄດ້ຢູ່ໃນເດືອນທີ່ເລືອກ.',
    'different' => ':attribute ແລະ :other must be different.',
    'digits' => 'ຈຳນວນ :attribute ຕ້ອງເປັນໂຕເລກ :digits ໂຕ.',
    'digits_between' => ':attribute ຕ້ອງຢູ່ລະຫວ່າງ :min ແລະ :max digits.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'has_live_stock' => ':attribute ຍັງເຫຼືອພຽງ 0 ລາຍການ',
    'indisposable' => 'ຜູ້ບໍລິການອີເມວດັ່ງກ່າວບໍ່ປອດໄພ.',
    'distinct' => ':attribute field has a duplicate value.',
    'email' => 'ຮູບແບບຂອງ :attribute ຕ້ອງເປັນອີເມວທີຖືກຕ້ອງ.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'exists' => ':attribute ດັ່ງກ່າວ ບໍ່ຖືກຕ້ອງ.',
    'file' => ':attribute must be a file.',
    'filled' => ':attribute field must have a value.',
    'first_date_of_month' => ':attribute ຕ້ອງແມ່ນວັນທີ 1 ຂອງເດືອນ.',
    'gt' => [
        'numeric' => ':attribute must be greater than :value.',
        'file' => ':attribute must be greater than :value kilobytes.',
        'string' => ':attribute must be greater than :value characters.',
        'array' => ':attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute must be greater than or equal to :value.',
        'file' => ':attribute must be greater than or equal to :value kilobytes.',
        'string' => ':attribute must be greater than or equal to :value characters.',
        'array' => ':attribute must have :value items or more.',
    ],
    'image' => ':attribute must be an image.',
    'in' => ':attribute ດັ້ງກ່າວບໍ່ມີໃນລາຍການ.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute must be an integer.',
    'ip' => ':attribute must be a valid IP address.',
    'ipv4' => ':attribute must be a valid IPv4 address.',
    'ipv6' => ':attribute must be a valid IPv6 address.',
    'json' => ':attribute must be a valid JSON string.',
    'lao_phone_number' => 'ເບີໂທຕ້ອງເປັນເບີຫຼັກ 2,5,7,8 ຫຼື 9.',
    'lt' => [
        'numeric' => ':attribute must be less than :value.',
        'file' => ':attribute must be less than :value kilobytes.',
        'string' => ':attribute must be less than :value characters.',
        'array' => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute must be less than or equal to :value.',
        'file' => ':attribute must be less than or equal to :value kilobytes.',
        'string' => ':attribute must be less than or equal to :value characters.',
        'array' => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute ຕ້ອງມີຈຳນວນບໍ່ກາຍ :max.',
        'file' => ':attribute ຕ້ອງມີຂະໜາດບໍ່ກາຍ :max kilobytes.',
        'string' => ':attribute ຕ້ອງມີຈຳນວນບໍ່ກາຍ :max ຕົວອັກສອນ.',
        'array' => ':attribute ຕ້ອງມີຈຳນວນບໍ່ກາຍ :max items.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute ຕ້ອງມີຂະໜາດຢ່າງນ້ອຍ :min.',
        'file' => ':attribute ຕ້ອງມີຂະໜາດຢ່າງນ້ອຍ :min kilobytes.',
        'string' => ':attribute ຕ້ອງມີຂະໜາດຢ່າງນ້ອຍ :min ຕົວອັກສອນ.',
        'array' => ':attribute must have at least :min items.',
    ],
    'multiple_of' => ':attribute must be a multiple of :value.',
    'not_in' => ':attribute ດັ່ງກ່າວ ບໍ່ຖືກຕ້ອງ.',
    'not_regex' => ':attribute format ບໍ່ຖືກຕ້ອງ.',
    'numeric' => ':attribute ຕ້ອງເປັນຕົວເລກເທົ່ານັ້ນ.',
    'password' => 'The password is incorrect.',
    'present' => ':attribute field must be present.',
    'has_enough_stock' => ':attribute ໃນສະຕັອກຂາຍ ມີຈຳນວນບໍ່ພຽງພໍ.',
    'regex' => ':attribute format ບໍ່ຖືກຕ້ອງ.',
    'required' => ':attribute ບໍ່ສາມາດວ່າງເປົ່າໄດ້.',
    'required_if' => ':attribute ບໍ່ສາມາດວ່າງເປົ່າໄດ້ຖ້າ :other ມີຄ່າເທົ່າກັບ :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute ບໍ່ສາມາດວ່າງເປົ່າໄດ້ຖ້າ :values ວ່າງເປົ່າ.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'prohibited' => ':attribute field is prohibited.',
    'prohibited_if' => ':attribute field is prohibited when :other is :value.',
    'prohibited_unless' => ':attribute field is prohibited unless :other is in :values.',
    'prohibits' => ':attribute field prohibits :other from being present.',
    'same' => ':attribute ແລະ :other must match.',
    'size' => [
        'numeric' => ':attribute must be :size.',
        'file' => ':attribute must be :size kilobytes.',
        'string' => ':attribute must be :size characters.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute must start with one of the following: :values.',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid timezone.',
    'unique' => 'ມີ :attribute ດັ່ງກ່າວໃນລະບົບແລ້ວ.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute must be a valid URL.',
    'uuid' => ':attribute must be a valid UUID.',

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
        'bag' => "ຈຳນວນຖົງ",
        'company_name' => "ຊື່ບໍລິສັດ",
        "coordinator_email" => "ອີເມວຜູ້ປະສານງານ",
        "coordinator_name" => "ຊື່ຜູ້ປະສານງານ",
        "coordinator_phone" => "ເບີໂທຜູ້ປະສານງານ",
        "coordinator_surname" => "ນາມສະກຸນຜູ້ປະສານງານ",
        'description' => "ຄຳອະທິບາຍ",
        'discount' => "ສ່ວນລົດ",
        'email' => "ອີເມວ",
        'exceed_bag_charge' => "ຄ່າຖົງສ່ວນທີ່ກາຍມາ",
        'house_number' => "ເລກທີເຮືອນ",
        'name' => "ຊື່",
        'new_exceed_bag_charge' => "ຄ່າໃໝ່ຂອງຖົງສ່ວນທີ່ກາຍມາ",
        'package_id' => "ໄອດີແພັກເກດ",
        'password' => "ລະຫັດຜ່ານ",
        'price' => "ລາຄາ",
        'phone' => "ເບີໂທ",
        'village_details' => "ລາຍລະອຽດບ້ານ",
        "roles" => 'ບົດບາດຕ່າງໆ',
        'start_month' => "ເລີ່ມເດືອນທຳອິດ",
        'size' => "ຂະໜາດ",
        'surname' => "ນາມສະກຸນ",
        'user_id' => "ໄອດີຜູ້ໃຊ້",
        'customer_name' => 'ຊື່ລູກຄ້າ'
    ],

];
