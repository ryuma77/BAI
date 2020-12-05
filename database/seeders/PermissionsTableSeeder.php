<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'employee_create',
            ],
            [
                'id'    => 18,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 19,
                'title' => 'employee_show',
            ],
            [
                'id'    => 20,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 21,
                'title' => 'employee_access',
            ],
            [
                'id'    => 22,
                'title' => 'organization_access',
            ],
            [
                'id'    => 23,
                'title' => 'department_create',
            ],
            [
                'id'    => 24,
                'title' => 'department_edit',
            ],
            [
                'id'    => 25,
                'title' => 'department_show',
            ],
            [
                'id'    => 26,
                'title' => 'department_delete',
            ],
            [
                'id'    => 27,
                'title' => 'department_access',
            ],
            [
                'id'    => 28,
                'title' => 'business_unit_create',
            ],
            [
                'id'    => 29,
                'title' => 'business_unit_edit',
            ],
            [
                'id'    => 30,
                'title' => 'business_unit_show',
            ],
            [
                'id'    => 31,
                'title' => 'business_unit_delete',
            ],
            [
                'id'    => 32,
                'title' => 'business_unit_access',
            ],
            [
                'id'    => 33,
                'title' => 'division_create',
            ],
            [
                'id'    => 34,
                'title' => 'division_edit',
            ],
            [
                'id'    => 35,
                'title' => 'division_show',
            ],
            [
                'id'    => 36,
                'title' => 'division_delete',
            ],
            [
                'id'    => 37,
                'title' => 'division_access',
            ],
            [
                'id'    => 38,
                'title' => 'section_create',
            ],
            [
                'id'    => 39,
                'title' => 'section_edit',
            ],
            [
                'id'    => 40,
                'title' => 'section_show',
            ],
            [
                'id'    => 41,
                'title' => 'section_delete',
            ],
            [
                'id'    => 42,
                'title' => 'section_access',
            ],
            [
                'id'    => 43,
                'title' => 'position_create',
            ],
            [
                'id'    => 44,
                'title' => 'position_edit',
            ],
            [
                'id'    => 45,
                'title' => 'position_show',
            ],
            [
                'id'    => 46,
                'title' => 'position_delete',
            ],
            [
                'id'    => 47,
                'title' => 'position_access',
            ],
            [
                'id'    => 48,
                'title' => 'level_create',
            ],
            [
                'id'    => 49,
                'title' => 'level_edit',
            ],
            [
                'id'    => 50,
                'title' => 'level_show',
            ],
            [
                'id'    => 51,
                'title' => 'level_delete',
            ],
            [
                'id'    => 52,
                'title' => 'level_access',
            ],
            [
                'id'    => 53,
                'title' => 'team_create',
            ],
            [
                'id'    => 54,
                'title' => 'team_edit',
            ],
            [
                'id'    => 55,
                'title' => 'team_show',
            ],
            [
                'id'    => 56,
                'title' => 'team_delete',
            ],
            [
                'id'    => 57,
                'title' => 'team_access',
            ],
            [
                'id'    => 58,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 59,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 60,
                'title' => 'employee_data_access',
            ],
            [
                'id'    => 61,
                'title' => 'salary_create',
            ],
            [
                'id'    => 62,
                'title' => 'salary_edit',
            ],
            [
                'id'    => 63,
                'title' => 'salary_show',
            ],
            [
                'id'    => 64,
                'title' => 'salary_delete',
            ],
            [
                'id'    => 65,
                'title' => 'salary_access',
            ],
            [
                'id'    => 66,
                'title' => 'employee_family_create',
            ],
            [
                'id'    => 67,
                'title' => 'employee_family_edit',
            ],
            [
                'id'    => 68,
                'title' => 'employee_family_show',
            ],
            [
                'id'    => 69,
                'title' => 'employee_family_delete',
            ],
            [
                'id'    => 70,
                'title' => 'employee_family_access',
            ],
            [
                'id'    => 71,
                'title' => 'rotation_create',
            ],
            [
                'id'    => 72,
                'title' => 'rotation_edit',
            ],
            [
                'id'    => 73,
                'title' => 'rotation_show',
            ],
            [
                'id'    => 74,
                'title' => 'rotation_delete',
            ],
            [
                'id'    => 75,
                'title' => 'rotation_access',
            ],
            [
                'id'    => 76,
                'title' => 'promotion_create',
            ],
            [
                'id'    => 77,
                'title' => 'promotion_edit',
            ],
            [
                'id'    => 78,
                'title' => 'promotion_show',
            ],
            [
                'id'    => 79,
                'title' => 'promotion_delete',
            ],
            [
                'id'    => 80,
                'title' => 'promotion_access',
            ],
            [
                'id'    => 81,
                'title' => 'jobdesc_create',
            ],
            [
                'id'    => 82,
                'title' => 'jobdesc_edit',
            ],
            [
                'id'    => 83,
                'title' => 'jobdesc_show',
            ],
            [
                'id'    => 84,
                'title' => 'jobdesc_delete',
            ],
            [
                'id'    => 85,
                'title' => 'jobdesc_access',
            ],
            [
                'id'    => 86,
                'title' => 'absensi_access',
            ],
            [
                'id'    => 87,
                'title' => 'jadwal_create',
            ],
            [
                'id'    => 88,
                'title' => 'jadwal_edit',
            ],
            [
                'id'    => 89,
                'title' => 'jadwal_show',
            ],
            [
                'id'    => 90,
                'title' => 'jadwal_delete',
            ],
            [
                'id'    => 91,
                'title' => 'jadwal_access',
            ],
            [
                'id'    => 92,
                'title' => 'tarik_dataabsen_create',
            ],
            [
                'id'    => 93,
                'title' => 'tarik_dataabsen_edit',
            ],
            [
                'id'    => 94,
                'title' => 'tarik_dataabsen_show',
            ],
            [
                'id'    => 95,
                'title' => 'tarik_dataabsen_delete',
            ],
            [
                'id'    => 96,
                'title' => 'tarik_dataabsen_access',
            ],
            [
                'id'    => 97,
                'title' => 'tarik_data_absensi_access',
            ],
            [
                'id'    => 98,
                'title' => 'import_data_absensi_create',
            ],
            [
                'id'    => 99,
                'title' => 'import_data_absensi_edit',
            ],
            [
                'id'    => 100,
                'title' => 'import_data_absensi_show',
            ],
            [
                'id'    => 101,
                'title' => 'import_data_absensi_delete',
            ],
            [
                'id'    => 102,
                'title' => 'import_data_absensi_access',
            ],
            [
                'id'    => 103,
                'title' => 'input_absen_manual_create',
            ],
            [
                'id'    => 104,
                'title' => 'input_absen_manual_edit',
            ],
            [
                'id'    => 105,
                'title' => 'input_absen_manual_show',
            ],
            [
                'id'    => 106,
                'title' => 'input_absen_manual_delete',
            ],
            [
                'id'    => 107,
                'title' => 'input_absen_manual_access',
            ],
            [
                'id'    => 108,
                'title' => 'lembur_create',
            ],
            [
                'id'    => 109,
                'title' => 'lembur_edit',
            ],
            [
                'id'    => 110,
                'title' => 'lembur_show',
            ],
            [
                'id'    => 111,
                'title' => 'lembur_delete',
            ],
            [
                'id'    => 112,
                'title' => 'lembur_access',
            ],
            [
                'id'    => 113,
                'title' => 'cuti_access',
            ],
            [
                'id'    => 114,
                'title' => 'jenis_cuti_create',
            ],
            [
                'id'    => 115,
                'title' => 'jenis_cuti_edit',
            ],
            [
                'id'    => 116,
                'title' => 'jenis_cuti_show',
            ],
            [
                'id'    => 117,
                'title' => 'jenis_cuti_delete',
            ],
            [
                'id'    => 118,
                'title' => 'jenis_cuti_access',
            ],
            [
                'id'    => 119,
                'title' => 'pengajuancuti_create',
            ],
            [
                'id'    => 120,
                'title' => 'pengajuancuti_edit',
            ],
            [
                'id'    => 121,
                'title' => 'pengajuancuti_show',
            ],
            [
                'id'    => 122,
                'title' => 'pengajuancuti_delete',
            ],
            [
                'id'    => 123,
                'title' => 'pengajuancuti_access',
            ],
            [
                'id'    => 124,
                'title' => 'libur_nasional_create',
            ],
            [
                'id'    => 125,
                'title' => 'libur_nasional_edit',
            ],
            [
                'id'    => 126,
                'title' => 'libur_nasional_show',
            ],
            [
                'id'    => 127,
                'title' => 'libur_nasional_delete',
            ],
            [
                'id'    => 128,
                'title' => 'libur_nasional_access',
            ],
            [
                'id'    => 129,
                'title' => 'uploadsaldocuti_access',
            ],
            [
                'id'    => 130,
                'title' => 'setting_create',
            ],
            [
                'id'    => 131,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 132,
                'title' => 'setting_show',
            ],
            [
                'id'    => 133,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 134,
                'title' => 'setting_access',
            ],
            [
                'id'    => 135,
                'title' => 'payroll_access',
            ],
            [
                'id'    => 136,
                'title' => 'allowance_create',
            ],
            [
                'id'    => 137,
                'title' => 'allowance_edit',
            ],
            [
                'id'    => 138,
                'title' => 'allowance_show',
            ],
            [
                'id'    => 139,
                'title' => 'allowance_delete',
            ],
            [
                'id'    => 140,
                'title' => 'allowance_access',
            ],
            [
                'id'    => 141,
                'title' => 'deduction_create',
            ],
            [
                'id'    => 142,
                'title' => 'deduction_edit',
            ],
            [
                'id'    => 143,
                'title' => 'deduction_show',
            ],
            [
                'id'    => 144,
                'title' => 'deduction_delete',
            ],
            [
                'id'    => 145,
                'title' => 'deduction_access',
            ],
            [
                'id'    => 146,
                'title' => 'bpj_create',
            ],
            [
                'id'    => 147,
                'title' => 'bpj_edit',
            ],
            [
                'id'    => 148,
                'title' => 'bpj_show',
            ],
            [
                'id'    => 149,
                'title' => 'bpj_delete',
            ],
            [
                'id'    => 150,
                'title' => 'bpj_access',
            ],
            [
                'id'    => 151,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
