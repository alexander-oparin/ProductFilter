<?php

namespace common\models;

class Catalog implements CatalogInterface {
    /**
     * @param $request
     * @return array|\yii\db\ActiveRecord[]
     */
    public function search($request) {
        $query = Product::find()->orderBy('name');

        if (isset($request['filters']) || empty($request['filters'])) {

            $filters = $this->parseFilters($request['filters']);
            /** @var Filter $filter */
            foreach ($filters as $filter) {
                $query->andWhere([$filter->operator, $filter->prop, $filter->value]);
            }
        }

        $result = $query->all();

        return $result;
    }

    /**
     * @param $filters
     * @return Filter[]
     */
    private function parseFilters($filters) {
        $list = [];
        $model = new Product();

        foreach ($filters as $filter => $value) {
            if ($value === '') {
                continue;
            }

            if (preg_match('/_/', $filter)) {
                $array = explode('_', $filter);

                if (!in_array($array[1], [Filter::OPERATOR_MAX, Filter::OPERATOR_MIN, Filter::OPERATOR_LIKE])) {
                    continue;
                }

                $name = $array[0];
                $operator = ($array[1] === Filter::OPERATOR_MIN) ? '>=' : (($array[1] == Filter::OPERATOR_MAX) ? '<=' : Filter::OPERATOR_LIKE);
                if ($model->hasAttribute($name)) {
                    $list[] = new Filter($name, $value, $operator);
                }
            }
        }

        return $list;
    }
}