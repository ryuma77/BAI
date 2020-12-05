<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Employees
    Route::post('employees/media', 'EmployeeApiController@storeMedia')->name('employees.storeMedia');
    Route::apiResource('employees', 'EmployeeApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentApiController');

    // Business Units
    Route::apiResource('business-units', 'BusinessUnitApiController');

    // Divisions
    Route::apiResource('divisions', 'DivisionApiController');

    // Sections
    Route::apiResource('sections', 'SectionApiController');

    // Positions
    Route::apiResource('positions', 'PositionApiController');

    // Levels
    Route::apiResource('levels', 'LevelApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Salaries
    Route::apiResource('salaries', 'SalaryApiController');

    // Employee Families
    Route::post('employee-families/media', 'EmployeeFamilyApiController@storeMedia')->name('employee-families.storeMedia');
    Route::apiResource('employee-families', 'EmployeeFamilyApiController');

    // Rotations
    Route::apiResource('rotations', 'RotationApiController');

    // Promotions
    Route::apiResource('promotions', 'PromotionApiController');

    // Jobdescs
    Route::apiResource('jobdescs', 'JobdescApiController');

    // Jadwals
    Route::apiResource('jadwals', 'JadwalApiController');

    // Tarik Dataabsens
    Route::apiResource('tarik-dataabsens', 'TarikDataabsenApiController');

    // Import Data Absensis
    Route::apiResource('import-data-absensis', 'ImportDataAbsensiApiController');

    // Input Absen Manuals
    Route::apiResource('input-absen-manuals', 'InputAbsenManualApiController');

    // Lemburs
    Route::apiResource('lemburs', 'LemburApiController');

    // Jenis Cutis
    Route::apiResource('jenis-cutis', 'JenisCutiApiController');

    // Pengajuancutis
    Route::apiResource('pengajuancutis', 'PengajuancutiApiController');

    // Libur Nasionals
    Route::apiResource('libur-nasionals', 'LiburNasionalApiController');

    // Settings
    Route::apiResource('settings', 'SettingApiController');

    // Allowances
    Route::apiResource('allowances', 'AllowanceApiController');

    // Deductions
    Route::apiResource('deductions', 'DeductionApiController');

    // Bpjs
    Route::apiResource('bpjs', 'BpjsApiController');
});
