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

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute deve ser  date after :date.',
    'alpha'                => ':attribute deve conter somente letras.',
    'alpha_dash'           => ':attribute deve conter somente letras, números, and traços.',
    'alpha_num'            => ':attribute deve conter somente letras e números.',
    'array'                => ':attribute deve ser uma lista.',
    'before'               => ':attribute deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => ':attribute deve estar entre :min e :max.',
        'file'    => ':attribute deve ter entre :min e :max kilobytes.',
        'string'  => ':attribute deve ter entre :min e :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => ':attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O :attribute de confirmação não bate.',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => ':attribute não bate com o formato :format.',
    'different'            => 'Os campos :attribute e :other devem ter valores diferentes.',
    'digits'               => ':attribute deve ter :digits digitos.',
    'digits_between'       => ':attribute deve ter entre :min e :max digitos.',
    'dimensions'           => ':attribute não tem as dimensões válidas.',
    'distinct'             => ':attribute tem valores duplicados.',
    'email'                => ':attribute deve ser um email válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => ':attribute é obrigatório.',
    'image'                => ':attribute deve ser uma image.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => ':attribute não existem em :other.',
    'integer'              => ':attribute deve ser um inteiro.',
    'ip'                   => ':attribute deve ser um IP válido.',
    'json'                 => ':attribute deve ser um JSON válido.',
    'max'                  => [
        'numeric' => 'O :attribute deve ser maior que :max.',
        'file'    => 'O :attribute deve ter mais que :max kilobytes.',
        'string'  => 'O :attribute não pode ter mais que  :max characteres.',
        'array'   => 'O :attribute não pode ter mais que :max items.',
    ],
    'mimes'                => ':attribute deve ser  file of type: :values.',
    'mimetypes'            => ':attribute deve ser  file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute deve ser :min ou mais.',
        'file'    => ':attribute deve ser ter pelo menos :min kilobytes.',
        'string'  => ':attribute deve ser ter pelo menos :min characteres.',
        'array'   => ':attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O valor selecionado de :attribute é inválido.',
    'numeric'              => ':attribute deve ser um núumero.',
    'present'              => ':attribute deve estar presente.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => ':attribute é obrigatório.',
    'required_if'          => ':attribute é obrigatório quando :other é igual a :value.',
    'required_unless'      => ':attribute é obrigatório a menos que :other esteja em :values.',
    'required_with'        => ':attribute é obrigatório quanto :values está presente.',
    'required_with_all'    => ':attribute é obrigatório quanto :values está presente.',
    'required_without'     => ':attribute é obrigatório quanto :values não está presente.',
    'required_without_all' => ':attribute é obrigatório quanto nenhum dos valores :values esteja presente.',
    'same'                 => ':attribute e :other devem ser idênticos.',
    'size'                 => [
        'numeric' => ':attribute deve ser :size.',
        'file'    => ':attribute deve ter :size kilobytes.',
        'string'  => 'O texto :attribute deve ter :size characteres.',
        'array'   => 'A lista :attribute deve conter :size itens.',
    ],
    'string'               => ':attribute deve ser  string.',
    'timezone'             => ':attribute deve ser um timezone válido.',
    'unique'               => ':attribute com esse valor já existe.',
    'uploaded'             => 'Falha no upload de :attribute .',
    'url'                  => 'O formato d:attribute é inválido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
