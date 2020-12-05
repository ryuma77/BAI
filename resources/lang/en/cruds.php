<?php

return [
    'userManagement'    => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'              => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
        ],
    ],
    'employee'          => [
        'title'          => 'Master Karyawan',
        'title_singular' => 'Master Karyawan',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'department'             => 'Department',
            'department_helper'      => ' ',
            'division'               => 'Division',
            'division_helper'        => ' ',
            'marital_status'         => 'Marital Status',
            'marital_status_helper'  => ' ',
            'employee_status'        => 'Employee Status',
            'employee_status_helper' => ' ',
            'jpg'                    => 'Photo',
            'jpg_helper'             => ' ',
            'nik'                    => 'NIK',
            'nik_helper'             => ' ',
            'nama'                   => 'Nama',
            'nama_helper'            => ' ',
            'tempat_lahir'           => 'Tempat Lahir',
            'tempat_lahir_helper'    => ' ',
            'tanggal_lahir'          => 'Tanggal Lahir',
            'tanggal_lahir_helper'   => ' ',
            'jenis_kelamin'          => 'Jenis Kelamin',
            'jenis_kelamin_helper'   => ' ',
            'position'               => 'Position',
            'position_helper'        => ' ',
            'alamat'                 => 'Alamat',
            'alamat_helper'          => ' ',
            'resign'                 => 'Resign',
            'resign_helper'          => ' ',
            'kota'                   => 'Kota',
            'kota_helper'            => ' ',
            'kode_pos'               => 'Kode Pos',
            'kode_pos_helper'        => ' ',
        ],
    ],
    'organization'      => [
        'title'          => 'Organisasi',
        'title_singular' => 'Organisasi',
    ],
    'department'        => [
        'title'          => 'Department',
        'title_singular' => 'Department',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'department_name'        => 'Department Name',
            'department_name_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'department_code'        => 'Department Code',
            'department_code_helper' => ' ',
            'division_name'          => 'Division Name',
            'division_name_helper'   => ' ',
        ],
    ],
    'businessUnit'      => [
        'title'          => 'Unit Bisnis',
        'title_singular' => 'Unit Bisni',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'business_unit_code'        => 'Business Unit Code',
            'business_unit_code_helper' => ' ',
            'business_unit_name'        => 'Business Unit Name',
            'business_unit_name_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'lokasi'                    => 'Lokasi',
            'lokasi_helper'             => ' ',
        ],
    ],
    'division'          => [
        'title'          => 'Divisi',
        'title_singular' => 'Divisi',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'division_code'        => 'Division Code',
            'division_code_helper' => ' ',
            'division_name'        => 'Division Name',
            'division_name_helper' => ' ',
            'business_unit'        => 'Business Unit',
            'business_unit_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'section'           => [
        'title'          => 'Bagian',
        'title_singular' => 'Bagian',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'section_code'           => 'Section Code',
            'section_code_helper'    => ' ',
            'section_name'           => 'Section Name',
            'section_name_helper'    => ' ',
            'department_name'        => 'Department Name',
            'department_name_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'position'          => [
        'title'          => 'Jabatan',
        'title_singular' => 'Jabatan',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'position_name'        => 'Position Name',
            'position_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'kode_jabatan'         => 'Kode Jabatan',
            'kode_jabatan_helper'  => ' ',
        ],
    ],
    'level'             => [
        'title'          => 'Level',
        'title_singular' => 'Level',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'level_code'        => 'Level Code',
            'level_code_helper' => ' ',
            'level_name'        => 'Level Name',
            'level_name_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'team'              => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'auditLog'          => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'employeeData'      => [
        'title'          => 'Data Karyawan',
        'title_singular' => 'Data Karyawan',
    ],
    'salary'            => [
        'title'          => 'Gaji & Fasilitas',
        'title_singular' => 'Gaji & Fasilita',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'employee'            => 'Employee',
            'employee_helper'     => ' ',
            'basic_salary'        => 'Basic Salary',
            'basic_salary_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'bpjs'                => 'Bpjs',
            'bpjs_helper'         => ' ',
            'tunjangan'           => 'Tunjangan',
            'tunjangan_helper'    => ' ',
            'potongan'            => 'Potongan',
            'potongan_helper'     => ' ',
        ],
    ],
    'employeeFamily'    => [
        'title'          => 'Data Keluarga',
        'title_singular' => 'Data Keluarga',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'employee_name'        => 'Employee Name',
            'employee_name_helper' => ' ',
            'family_name'          => 'Family Name',
            'family_name_helper'   => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'keterangan'           => 'Keterangan',
            'keterangan_helper'    => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'nik'                  => 'Nik',
            'nik_helper'           => ' ',
            'team'                 => 'Team',
            'team_helper'          => ' ',
        ],
    ],
    'rotation'          => [
        'title'          => 'Rotasi Karyawan',
        'title_singular' => 'Rotasi Karyawan',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'employee_name'          => 'Employee Name',
            'employee_name_helper'   => ' ',
            'department_from'        => 'Department From',
            'department_from_helper' => ' ',
            'department_to'          => 'Department To',
            'department_to_helper'   => ' ',
            'valid_date'             => 'Valid Date',
            'valid_date_helper'      => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'promotion'         => [
        'title'          => 'Promosi & Demosi',
        'title_singular' => 'Promosi & Demosi',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'employee_name'          => 'Employee Name',
            'employee_name_helper'   => ' ',
            'department_from'        => 'Department From',
            'department_from_helper' => ' ',
            'level_from'             => 'Level From',
            'level_from_helper'      => ' ',
            'position_from'          => 'Position From',
            'position_from_helper'   => ' ',
            'level_to'               => 'Level To',
            'level_to_helper'        => ' ',
            'position_to'            => 'Position To',
            'position_to_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'jobdesc'           => [
        'title'          => 'Jobdesc',
        'title_singular' => 'Jobdesc',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'department'        => 'Department',
            'department_helper' => ' ',
            'position'          => 'Position',
            'position_helper'   => ' ',
            'level'             => 'Level',
            'level_helper'      => ' ',
            'jobdesc'           => 'Jobdesc',
            'jobdesc_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'absensi'           => [
        'title'          => 'Absensi',
        'title_singular' => 'Absensi',
    ],
    'jadwal'            => [
        'title'          => 'Jadwal',
        'title_singular' => 'Jadwal',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'tanggal_awal'           => 'Tanggal Awal',
            'tanggal_awal_helper'    => ' ',
            'tanggal_akhir'          => 'Tanggal Akhir',
            'tanggal_akhir_helper'   => ' ',
            'departement'            => 'Departement',
            'departement_helper'     => ' ',
            'bagian'                 => 'Bagian',
            'bagian_helper'          => ' ',
            'jam_masuk'              => 'Jam Masuk',
            'jam_masuk_helper'       => ' ',
            'jam_pulang'             => 'Jam Pulang',
            'jam_pulang_helper'      => ' ',
            'kategori_jadwal'        => 'Kategori Jadwal',
            'kategori_jadwal_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'tarikDataabsen'    => [
        'title'          => 'Tarik Data  Mesin',
        'title_singular' => 'Tarik Data  Mesin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ip_address'        => 'Ip Address',
            'ip_address_helper' => ' ',
            'nik'               => 'Nik',
            'nik_helper'        => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'jam_masuk'         => 'Jam Masuk',
            'jam_masuk_helper'  => ' ',
            'jam_keluar'        => 'Jam Keluar',
            'jam_keluar_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Team',
            'team_helper'       => ' ',
        ],
    ],
    'tarikDataAbsensi'  => [
        'title'          => 'Tarik Data Absensi',
        'title_singular' => 'Tarik Data Absensi',
    ],
    'importDataAbsensi' => [
        'title'          => 'Import Data Absensi',
        'title_singular' => 'Import Data Absensi',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nik'               => 'Nik',
            'nik_helper'        => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'jam_masuk'         => 'Jam Masuk',
            'jam_masuk_helper'  => ' ',
            'jam_keluar'        => 'Jam Keluar',
            'jam_keluar_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'inputAbsenManual'  => [
        'title'          => 'Input Absen Manual',
        'title_singular' => 'Input Absen Manual',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ip_address'        => 'Ip Address',
            'ip_address_helper' => ' ',
            'nik'               => 'Nik',
            'nik_helper'        => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'jam_masuk'         => 'Jam Masuk',
            'jam_masuk_helper'  => ' ',
            'jam_keluar'        => 'Jam Keluar',
            'jam_keluar_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Team',
            'team_helper'       => ' ',
        ],
    ],
    'lembur'            => [
        'title'          => 'Lembur',
        'title_singular' => 'Lembur',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ip_address'        => 'Ip Address',
            'ip_address_helper' => ' ',
            'nik'               => 'Nik',
            'nik_helper'        => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'jam_lembur'        => 'Jam Lembur',
            'jam_lembur_helper' => ' ',
            'keterangan'        => 'Keterangan',
            'keterangan_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'team'              => 'Team',
            'team_helper'       => ' ',
        ],
    ],
    'cuti'              => [
        'title'          => 'Cuti',
        'title_singular' => 'Cuti',
    ],
    'jenisCuti'         => [
        'title'          => 'Jenis Cuti',
        'title_singular' => 'Jenis Cuti',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'kode_cuti'            => 'Kode Cuti',
            'kode_cuti_helper'     => ' ',
            'jenis_cuti'           => 'Jenis Cuti',
            'jenis_cuti_helper'    => ' ',
            'maks_pertahun'        => 'Maks Pertahun',
            'maks_pertahun_helper' => ' ',
            'keterangan'           => 'Keterangan',
            'keterangan_helper'    => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'pengajuancuti'     => [
        'title'          => 'Pengajuan Cuti',
        'title_singular' => 'Pengajuan Cuti',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nik'                 => 'Nik',
            'nik_helper'          => ' ',
            'nama'                => 'Nama',
            'nama_helper'         => ' ',
            'jenis_cuti'          => 'Jenis Cuti',
            'jenis_cuti_helper'   => ' ',
            'tanggal_cuti'        => 'Tanggal Cuti',
            'tanggal_cuti_helper' => ' ',
            'lama_cuti'           => 'Lama Cuti',
            'lama_cuti_helper'    => ' ',
            'sisa_cuti'           => 'Sisa Cuti',
            'sisa_cuti_helper'    => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'liburNasional'     => [
        'title'          => 'Libur Nasional',
        'title_singular' => 'Libur Nasional',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tanggal'           => 'Tanggal',
            'tanggal_helper'    => ' ',
            'keterangan'        => 'Keterangan',
            'keterangan_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'uploadsaldocuti'   => [
        'title'          => 'Upload Saldo Cuti',
        'title_singular' => 'Upload Saldo Cuti',
    ],
    'setting'           => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'auto_cancel_cuti'        => 'Auto Cancel Cuti',
            'auto_cancel_cuti_helper' => ' ',
            'awal_saldo_cuti'         => 'Awal Saldo Cuti',
            'awal_saldo_cuti_helper'  => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'payroll'           => [
        'title'          => 'Payroll',
        'title_singular' => 'Payroll',
    ],
    'allowance'         => [
        'title'          => 'Allowance',
        'title_singular' => 'Allowance',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'kode_allowance'        => 'Kode Allowance',
            'kode_allowance_helper' => ' ',
            'allowance'             => 'Allowance',
            'allowance_helper'      => ' ',
            'allowance_type'        => 'Allowance Type',
            'allowance_type_helper' => ' ',
            'nilai'                 => 'Nilai',
            'nilai_helper'          => ' ',
            'keterangan'            => 'Keterangan',
            'keterangan_helper'     => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'deduction'         => [
        'title'          => 'Deduction',
        'title_singular' => 'Deduction',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'kode_allowance'        => 'Kode Allowance',
            'kode_allowance_helper' => ' ',
            'allowance'             => 'Allowance',
            'allowance_helper'      => ' ',
            'allowance_type'        => 'Allowance Type',
            'allowance_type_helper' => ' ',
            'nilai'                 => 'Nilai',
            'nilai_helper'          => ' ',
            'keterangan'            => 'Keterangan',
            'keterangan_helper'     => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'bpj'               => [
        'title'          => 'Bpjs',
        'title_singular' => 'Bpj',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'jenis_program'        => 'Jenis Program',
            'jenis_program_helper' => ' ',
            'perusahaan'           => 'Perusahaan',
            'perusahaan_helper'    => ' ',
            'karyawan'             => 'Karyawan',
            'karyawan_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
];
