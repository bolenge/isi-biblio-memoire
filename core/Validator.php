<?php
    namespace Core;

    use Ekolo\Builder\Http\Validator as RequestValidator;

    class Validator extends RequestValidator {

        public function setRules(array $rules = [])
        {
            $this->rules = $rules;
        }

    }