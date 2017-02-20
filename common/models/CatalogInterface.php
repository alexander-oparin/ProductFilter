<?php

namespace common\models;

interface CatalogInterface {
    const DEFAULT_WIDTH_MIN = 0;
    const DEFAULT_WIDTH_MAX = 1000;
    const DEFAULT_HEIGHT_MIN = 0;
    const DEFAULT_HEIGHT_MAX = 1000;
    const DEFAULT_PRICE_MIN = 0;
    const DEFAULT_PRICE_MAX = 1000;


    public function search($request);
}