<?php

/* @var $this yii\web\View */

$this->title = 'Фильтр товаров';

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0-rc.2/angular.min.js', ['depends' => ['frontend\assets\AppAsset']]);
$this->registerJsFile('js/catalog.min.js', ['depends' => ['frontend\assets\AppAsset']]);


?>
<div class="site-index">
    <div class="body-content" ng-app="catalog" ng-controller="CatalogCtrl as Catalog">
        <h1 class="text-center"><?= $this->title ?></h1>
        <hr>
        <div class="row">
            <div class="col-lg-3 text-left">
                <label>Название:
                    <input type="text" class="form-control" ng-model="Catalog.name_like"/>
                </label>
            </div>
            <div class="col-lg-3 text-left">
                <label>Ширина, мин:
                    <input type="number" class="form-control" ng-model="Catalog.width_min"/>
                </label>
                <label>Ширина, макс:
                    <input type="number" class="form-control" ng-model="Catalog.width_max"/>
                </label>
            </div>
            <div class="col-lg-3 text-left">
                <label>Высота, мин:
                    <input type="number" class="form-control" ng-model="Catalog.height_min"/>
                </label>
                <label>Высота, макс:
                    <input type="number" class="form-control" ng-model="Catalog.height_max"/>
                </label>
            </div>
            <div class="col-lg-3 text-left">
                <label>Цена, мин:
                    <input type="number" class="form-control" ng-model="Catalog.price_min"/>
                </label>
                <label>Цена, макс:
                    <input type="number" class="form-control" ng-model="Catalog.price_max"/>
                </label>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <button class="btn btn-lg btn-success" ng-click="Catalog.actionSearch()">Искать</button>
        </div>
        <hr>
        <div class="row">
            <table class="col-lg-12">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Ширина</th>
                    <th>Высота</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody ng-repeat="product in Catalog.products">
                <tr>
                    <td><span>{{product.name}}</span></td>
                    <td><span>{{product.width}}</span></td>
                    <td><span>{{product.height}}</span></td>
                    <td><span>{{product.price}}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
