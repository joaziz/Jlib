<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 05:17 م
 */


return (function () {

    $scope = "panel";

    return [
        /*
         *  current path for this file
         */
        "basePath" => __DIR__,
        /*
         * admin auth configs
         */
        "adminAuth" => [
            // domain uri for admin scope you can change it
            "scopeDomain" => $scope,

        ],
        "company" => [
            "name" => "Hive Advertising",
            "website" => "http://hive-ad.com",
        ],
        "shared" => [
            "panelURI" => url($scope),
            "JLibScope" => $scope,
            "adminTitle" => "Hive Admin Panel",
            "companyName" => "Hive Advertising",
            "companyWebsite" => "http://hive-ad.com",
        ],

    ];
})();