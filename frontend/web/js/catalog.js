function CatalogCtrl($scope, $http) {
    var scope = this;

    scope.part = {good_id: 1, quantity: 1};
    scope.products = {};
    scope.width_min = 0;
    scope.width_max = 1000;
    scope.height_min = 0;
    scope.height_max = 1000;
    scope.price_min = 0;
    scope.price_max = 10000;
    scope.name_like = '';

    scope.getFilters = function () {
        return {
            width_min: scope.width_min,
            width_max: scope.width_max,
            height_min: scope.height_min,
            height_max: scope.height_max,
            price_min: scope.price_min,
            price_max: scope.price_max,
            name_like: scope.name_like
        };
    };

    scope.actionSearch = function () {
        $http.post('/catalog/search', {
            filters: scope.getFilters()
        }).then(function (data) {
            if (data.status == 200) {
                scope.products = data.data;
            }
        });
    };

    scope.actionSearch();
}

var catalog = angular.module("catalog", []);
catalog.controller("CatalogCtrl", ['$scope', '$http', CatalogCtrl]);
catalog.filter('reverse', function () {
    return function (items) {
        return items.slice().reverse();
    };
});
