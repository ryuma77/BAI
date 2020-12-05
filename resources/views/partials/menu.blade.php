<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('organization_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/business-units*") ? "menu-open" : "" }} {{ request()->is("admin/divisions*") ? "menu-open" : "" }} {{ request()->is("admin/departments*") ? "menu-open" : "" }} {{ request()->is("admin/sections*") ? "menu-open" : "" }} {{ request()->is("admin/positions*") ? "menu-open" : "" }} {{ request()->is("admin/levels*") ? "menu-open" : "" }} {{ request()->is("admin/jobdescs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-bezier-curve">

                            </i>
                            <p>
                                {{ trans('cruds.organization.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('business_unit_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.business-units.index") }}" class="nav-link {{ request()->is("admin/business-units") || request()->is("admin/business-units/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.businessUnit.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('division_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.divisions.index") }}" class="nav-link {{ request()->is("admin/divisions") || request()->is("admin/divisions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.division.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.department.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('section_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sections.index") }}" class="nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.section.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('position_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.positions.index") }}" class="nav-link {{ request()->is("admin/positions") || request()->is("admin/positions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.position.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('level_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.levels.index") }}" class="nav-link {{ request()->is("admin/levels") || request()->is("admin/levels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.level.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('jobdesc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jobdescs.index") }}" class="nav-link {{ request()->is("admin/jobdescs") || request()->is("admin/jobdescs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobdesc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('employee_data_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/employees*") ? "menu-open" : "" }} {{ request()->is("admin/employee-families*") ? "menu-open" : "" }} {{ request()->is("admin/rotations*") ? "menu-open" : "" }} {{ request()->is("admin/promotions*") ? "menu-open" : "" }} {{ request()->is("admin/salaries*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.employeeData.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('employee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employees.index") }}" class="nav-link {{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('employee_family_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employee-families.index") }}" class="nav-link {{ request()->is("admin/employee-families") || request()->is("admin/employee-families/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employeeFamily.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rotation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rotations.index") }}" class="nav-link {{ request()->is("admin/rotations") || request()->is("admin/rotations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rotation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('promotion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.promotions.index") }}" class="nav-link {{ request()->is("admin/promotions") || request()->is("admin/promotions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.promotion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('salary_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.salaries.index") }}" class="nav-link {{ request()->is("admin/salaries") || request()->is("admin/salaries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salary.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('absensi_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/jadwals*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/input-absen-manuals*") ? "menu-open" : "" }} {{ request()->is("admin/lemburs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.absensi.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('jadwal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jadwals.index") }}" class="nav-link {{ request()->is("admin/jadwals") || request()->is("admin/jadwals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jadwal.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tarik_data_absensi_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/tarik-dataabsens*") ? "menu-open" : "" }} {{ request()->is("admin/import-data-absensis*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tarikDataAbsensi.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('tarik_dataabsen_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.tarik-dataabsens.index") }}" class="nav-link {{ request()->is("admin/tarik-dataabsens") || request()->is("admin/tarik-dataabsens/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.tarikDataabsen.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('import_data_absensi_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.import-data-absensis.index") }}" class="nav-link {{ request()->is("admin/import-data-absensis") || request()->is("admin/import-data-absensis/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.importDataAbsensi.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('input_absen_manual_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.input-absen-manuals.index") }}" class="nav-link {{ request()->is("admin/input-absen-manuals") || request()->is("admin/input-absen-manuals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.inputAbsenManual.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lembur_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lemburs.index") }}" class="nav-link {{ request()->is("admin/lemburs") || request()->is("admin/lemburs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lembur.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('cuti_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/jenis-cutis*") ? "menu-open" : "" }} {{ request()->is("admin/pengajuancutis*") ? "menu-open" : "" }} {{ request()->is("admin/libur-nasionals*") ? "menu-open" : "" }} {{ request()->is("admin/uploadsaldocutis*") ? "menu-open" : "" }} {{ request()->is("admin/settings*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.cuti.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('jenis_cuti_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jenis-cutis.index") }}" class="nav-link {{ request()->is("admin/jenis-cutis") || request()->is("admin/jenis-cutis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jenisCuti.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pengajuancuti_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pengajuancutis.index") }}" class="nav-link {{ request()->is("admin/pengajuancutis") || request()->is("admin/pengajuancutis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pengajuancuti.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('libur_nasional_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.libur-nasionals.index") }}" class="nav-link {{ request()->is("admin/libur-nasionals") || request()->is("admin/libur-nasionals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.liburNasional.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('uploadsaldocuti_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.uploadsaldocutis.index") }}" class="nav-link {{ request()->is("admin/uploadsaldocutis") || request()->is("admin/uploadsaldocutis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.uploadsaldocuti.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.setting.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payroll_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/allowances*") ? "menu-open" : "" }} {{ request()->is("admin/deductions*") ? "menu-open" : "" }} {{ request()->is("admin/bpjs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.payroll.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('allowance_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.allowances.index") }}" class="nav-link {{ request()->is("admin/allowances") || request()->is("admin/allowances/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.allowance.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('deduction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.deductions.index") }}" class="nav-link {{ request()->is("admin/deductions") || request()->is("admin/deductions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.deduction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('bpj_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.bpjs.index") }}" class="nav-link {{ request()->is("admin/bpjs") || request()->is("admin/bpjs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bpj.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                            <i class="fa-fw fa fa-users nav-icon">
                            </i>
                            <p>
                                {{ trans("global.team-members") }}
                            </p>
                        </a>
                    </li>
                @endif
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>