<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Employees
    Route::delete('employees/destroy', 'EmployeeController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/media', 'EmployeeController@storeMedia')->name('employees.storeMedia');
    Route::post('employees/ckmedia', 'EmployeeController@storeCKEditorImages')->name('employees.storeCKEditorImages');
    Route::resource('employees', 'EmployeeController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Business Units
    Route::delete('business-units/destroy', 'BusinessUnitController@massDestroy')->name('business-units.massDestroy');
    Route::resource('business-units', 'BusinessUnitController');

    // Divisions
    Route::delete('divisions/destroy', 'DivisionController@massDestroy')->name('divisions.massDestroy');
    Route::resource('divisions', 'DivisionController');

    // Sections
    Route::delete('sections/destroy', 'SectionController@massDestroy')->name('sections.massDestroy');
    Route::resource('sections', 'SectionController');

    // Positions
    Route::delete('positions/destroy', 'PositionController@massDestroy')->name('positions.massDestroy');
    Route::resource('positions', 'PositionController');

    // Levels
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::resource('levels', 'LevelController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Salaries
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::resource('salaries', 'SalaryController');

    // Employee Families
    Route::delete('employee-families/destroy', 'EmployeeFamilyController@massDestroy')->name('employee-families.massDestroy');
    Route::post('employee-families/media', 'EmployeeFamilyController@storeMedia')->name('employee-families.storeMedia');
    Route::post('employee-families/ckmedia', 'EmployeeFamilyController@storeCKEditorImages')->name('employee-families.storeCKEditorImages');
    Route::post('employee-families/parse-csv-import', 'EmployeeFamilyController@parseCsvImport')->name('employee-families.parseCsvImport');
    Route::post('employee-families/process-csv-import', 'EmployeeFamilyController@processCsvImport')->name('employee-families.processCsvImport');
    Route::resource('employee-families', 'EmployeeFamilyController');

    // Rotations
    Route::delete('rotations/destroy', 'RotationController@massDestroy')->name('rotations.massDestroy');
    Route::resource('rotations', 'RotationController');

    // Promotions
    Route::delete('promotions/destroy', 'PromotionController@massDestroy')->name('promotions.massDestroy');
    Route::resource('promotions', 'PromotionController');

    // Jobdescs
    Route::delete('jobdescs/destroy', 'JobdescController@massDestroy')->name('jobdescs.massDestroy');
    Route::resource('jobdescs', 'JobdescController');

    // Jadwals
    Route::delete('jadwals/destroy', 'JadwalController@massDestroy')->name('jadwals.massDestroy');
    Route::resource('jadwals', 'JadwalController');

    // Tarik Dataabsens
    Route::delete('tarik-dataabsens/destroy', 'TarikDataabsenController@massDestroy')->name('tarik-dataabsens.massDestroy');
    Route::post('tarik-dataabsens/parse-csv-import', 'TarikDataabsenController@parseCsvImport')->name('tarik-dataabsens.parseCsvImport');
    Route::post('tarik-dataabsens/process-csv-import', 'TarikDataabsenController@processCsvImport')->name('tarik-dataabsens.processCsvImport');
    Route::resource('tarik-dataabsens', 'TarikDataabsenController');

    // Import Data Absensis
    Route::delete('import-data-absensis/destroy', 'ImportDataAbsensiController@massDestroy')->name('import-data-absensis.massDestroy');
    Route::resource('import-data-absensis', 'ImportDataAbsensiController');

    // Input Absen Manuals
    Route::delete('input-absen-manuals/destroy', 'InputAbsenManualController@massDestroy')->name('input-absen-manuals.massDestroy');
    Route::post('input-absen-manuals/parse-csv-import', 'InputAbsenManualController@parseCsvImport')->name('input-absen-manuals.parseCsvImport');
    Route::post('input-absen-manuals/process-csv-import', 'InputAbsenManualController@processCsvImport')->name('input-absen-manuals.processCsvImport');
    Route::resource('input-absen-manuals', 'InputAbsenManualController');

    // Lemburs
    Route::delete('lemburs/destroy', 'LemburController@massDestroy')->name('lemburs.massDestroy');
    Route::post('lemburs/parse-csv-import', 'LemburController@parseCsvImport')->name('lemburs.parseCsvImport');
    Route::post('lemburs/process-csv-import', 'LemburController@processCsvImport')->name('lemburs.processCsvImport');
    Route::resource('lemburs', 'LemburController');

    // Jenis Cutis
    Route::delete('jenis-cutis/destroy', 'JenisCutiController@massDestroy')->name('jenis-cutis.massDestroy');
    Route::resource('jenis-cutis', 'JenisCutiController');

    // Pengajuancutis
    Route::delete('pengajuancutis/destroy', 'PengajuancutiController@massDestroy')->name('pengajuancutis.massDestroy');
    Route::resource('pengajuancutis', 'PengajuancutiController');

    // Libur Nasionals
    Route::delete('libur-nasionals/destroy', 'LiburNasionalController@massDestroy')->name('libur-nasionals.massDestroy');
    Route::resource('libur-nasionals', 'LiburNasionalController');

    // Uploadsaldocutis
    Route::resource('uploadsaldocutis', 'UploadsaldocutiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Settings
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // Allowances
    Route::delete('allowances/destroy', 'AllowanceController@massDestroy')->name('allowances.massDestroy');
    Route::resource('allowances', 'AllowanceController');

    // Deductions
    Route::delete('deductions/destroy', 'DeductionController@massDestroy')->name('deductions.massDestroy');
    Route::resource('deductions', 'DeductionController');

    // Bpjs
    Route::delete('bpjs/destroy', 'BpjsController@massDestroy')->name('bpjs.massDestroy');
    Route::resource('bpjs', 'BpjsController');

    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
