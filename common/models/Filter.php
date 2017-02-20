<?php

namespace common\models;

/**
 * Class Filter
 *
 * @property string $prop
 * @property string $operator
 * @property string $value
 */
class Filter {
    const OPERATOR_MIN = 'min';
    const OPERATOR_MAX = 'max';
    const OPERATOR_LIKE = 'like';

    public function __construct($prop, $value, $operator) {
        $this->prop = $prop;
        $this->value = $value;
        $this->operator = $operator;
    }
}