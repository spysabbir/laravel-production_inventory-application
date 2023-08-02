<ul class="nav nav-tabs b-none">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all-tab"><i class="fa fa-list-ul"></i>All</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#report-tab">Report</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting-tab">Settings</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active show" id="all-tab">
        <nav class="sidebar-nav">
            <ul class="metismenu ci-effect-1">

                <li class="g_heading">Admin Panel</li>

                @if (Auth::user()->can('RoleManagementMenu'))
                <li class="{{ request()->routeIs('admin.role.index') || request()->routeIs('admin.role-permission.index')  ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Role Management">Role Management</span></a>
                    <ul>
                        @if (Auth::user()->can('role.index'))
                            <li class="{{ request()->routeIs('admin.role.index') ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}"><span data-hover="Role">Role</span></a></li>
                        @endif

                        @if (Auth::user()->can('role-permission.index'))
                            <li class="{{ request()->routeIs('admin.role-permission.index') ? 'active' : '' }}"><a href="{{ route('admin.role-permission.index') }}"><span data-hover="Assign Permission">Assign Permission</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (Auth::user()->can('UserMenu'))
                <li class="{{ request()->routeIs('admin.user.index') || request()->routeIs('admin.user.create')  ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="User">User</span></a>
                    <ul>
                        @if (Auth::user()->can('user.create'))
                            <li class="{{ request()->routeIs('admin.user.create') ? 'active' : '' }}"><a href="{{ route('admin.user.create') }}"><span data-hover="Create">Create</span></a></li>
                        @endif

                        @if (Auth::user()->can('user.index'))
                            <li class="{{ request()->routeIs('admin.user.index') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}"><span data-hover="List">List</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (Auth::user()->can('EmployeeResourcesMenu'))
                <li class="{{ request()->routeIs('admin.department.index') || request()->routeIs('admin.designation.index')  ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Employee Resources">Employee Resources</span></a>
                    <ul>
                        @if (Auth::user()->can('department.index'))
                            <li class="{{ request()->routeIs('admin.department.index') ? 'active' : '' }}"><a href="{{ route('admin.department.index') }}"><span data-hover="Department">Department</span></a></li>
                        @endif

                        @if (Auth::user()->can('designation.index'))
                            <li class="{{ request()->routeIs('admin.designation.index') ? 'active' : '' }}"><a href="{{ route('admin.designation.index') }}"><span data-hover="Designation">Designation</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (Auth::user()->can('SettingMenu'))
                <li class="{{ request()->routeIs('admin.default.setting')  ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Setting">Setting</span></a>
                    <ul>
                        @if (Auth::user()->can('default.setting'))
                            <li class="{{ request()->routeIs('admin.default.setting') ? 'active' : '' }}"><a href="{{ route('admin.default.setting') }}"><span data-hover="Default Setting">Default Setting</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Employee Panel --}}
                <li class="g_heading">Employee Panel</li>

                {{-- HR Panel --}}
                @if (Auth::user()->can('EmployeeMenu'))
                <li class="{{ request()->routeIs('employee.employee.create') || request()->routeIs('employee.employee.index') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Employee">Employee</span></a>
                    <ul>
                        @if (Auth::user()->can('employee.create'))
                            <li class="{{ request()->routeIs('employee.employee.create') ? 'active' : '' }}"><a href="{{ route('employee.employee.create') }}"><span data-hover="Create">Create</span></a></li>
                        @endif

                        @if (Auth::user()->can('employee.index'))
                            <li class="{{ request()->routeIs('employee.employee.index') ? 'active' : '' }}"><a href="{{ route('employee.employee.index') }}"><span data-hover="List">List</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Merchandiser & Planning Panel --}}
                @if (Auth::user()->can('StyleResourcesMenu'))
                <li class="{{ request()->routeIs('employee.buyer.index') || request()->routeIs('employee.style.index') || request()->routeIs('employee.season.index') || request()->routeIs('employee.color.index') || request()->routeIs('employee.wash.index') || request()->routeIs('employee.garment-type.index') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Style Resources">Style Resources</span></a>
                    <ul>
                        @if (Auth::user()->can('buyer.index'))
                            <li class="{{ request()->routeIs('employee.buyer.index') ? 'active' : '' }}"><a href="{{ route('employee.buyer.index') }}"><span data-hover="Buyer">Buyer</span></a></li>
                        @endif

                        @if (Auth::user()->can('style.index'))
                            <li class="{{ request()->routeIs('employee.style.index') ? 'active' : '' }}"><a href="{{ route('employee.style.index') }}"><span data-hover="Style">Style</span></a></li>
                        @endif

                        @if (Auth::user()->can('season.index'))
                            <li class="{{ request()->routeIs('employee.season.index') ? 'active' : '' }}"><a href="{{ route('employee.season.index') }}"><span data-hover="Season">Season</span></a></li>
                        @endif

                        @if (Auth::user()->can('color.index'))
                            <li class="{{ request()->routeIs('employee.color.index') ? 'active' : '' }}"><a href="{{ route('employee.color.index') }}"><span data-hover="Color">Color</span></a></li>
                        @endif

                        @if (Auth::user()->can('wash.index'))
                            <li class="{{ request()->routeIs('employee.wash.index') ? 'active' : '' }}"><a href="{{ route('employee.wash.index') }}"><span data-hover="Wash">Wash</span></a></li>
                        @endif

                        @if (Auth::user()->can('garment-type.index'))
                            <li class="{{ request()->routeIs('employee.garment-type.index') ? 'active' : '' }}"><a href="{{ route('employee.garment-type.index') }}"><span data-hover="Garment Type">Garment Type</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (Auth::user()->can('MasterStyleMenu'))
                    @if (Auth::user()->can('master-style.index'))
                        <li class="{{ request()->routeIs('employee.master-style.index') ? 'active' : '' }}"><a href="{{ route('employee.master-style.index') }}"><i class="icon-notebook"></i><span data-hover="Master Style">Master Style</span></a></li>
                    @endif
                @endif

                @if (Auth::user()->can('OthersResourcesMenu'))
                <li class="{{ request()->routeIs('employee.line.index') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-home"></i><span data-hover="Others Resources">Others Resources</span></a>
                    <ul>
                        @if (Auth::user()->can('line.index'))
                        <li class="{{ request()->routeIs('employee.line.index') ? 'active' : '' }}"><a href="{{ route('employee.line.index') }}"><span data-hover="Line">Line</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Cutting Panel --}}
                @if (Auth::user()->can('CuttingMenu'))
                <li>
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-tag"></i><span data-hover="Cutting">Cutting</span></a>
                    <ul>
                        @if (Auth::user()->can('new-cutting.index'))
                            <li><a href="#"><span data-hover="New Cutting">New Cutting</span></a></li>
                        @endif

                        @if (Auth::user()->can('sewing-input.index'))
                            <li><a href="#"><span data-hover="Sewing Input">Sewing Input</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Sewing Panel --}}
                @if (Auth::user()->can('SewingMenu'))
                    @if (Auth::user()->can('sewing-production.index'))
                        <li><a href="#"><i class="icon-puzzle"></i><span data-hover="Sewing">Sewing</span></a></li>
                    @endif
                @endif

                {{-- Washing Panel --}}
                @if (Auth::user()->can('WashingMenu'))
                <li>
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-tag"></i><span data-hover="Wash">Wash</span></a>
                    <ul>
                        @if (Auth::user()->can('delivery-washing.index'))
                            <li><a href="#"><span data-hover="Delivery to Washing">Delivery to Washing</span></a></li>
                        @endif

                        @if (Auth::user()->can('receive-washing.index'))
                            <li><a href="#"><span data-hover="Receive from Washing ">Receive from Washing</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Finishing Panel --}}
                @if (Auth::user()->can('FinishingMenu'))
                <li>
                    <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-tag"></i><span data-hover="Finishing">Finishing</span></a>
                    <ul>
                        @if (Auth::user()->can('delivery-finishing.index'))
                            <li><a href="#"><span data-hover="Delivery to Finishing">Delivery to Finishing</span></a></li>
                        @endif

                        @if (Auth::user()->can('delivery-packed.index'))
                            <li><a href="#"><span data-hover="Delivery to Packed GMTS">Delivery to Packed GMTS</span></a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- Shipping Panel --}}
                @if (Auth::user()->can('ShippingMenu'))
                    @if (Auth::user()->can('shipping.index'))
                        <li><a href="#"><i class="icon-puzzle"></i><span data-hover="Shipping">Shipping</span></a></li>
                    @endif
                @endif

            </ul>
        </nav>
    </div>
    <div class="tab-pane fade" id="report-tab">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="g_heading">Admin Panel</li>
                <li><a href="#"><i class="fe fe-type"></i><span>Typography</span></a></li>
                <li><a href="#"><i class="fe fe-feather"></i><span>Colors</span></a></li>
            </ul>
        </nav>
    </div>
    <div class="tab-pane fade" id="setting-tab">
        <div class="mb-4 mt-3">
            <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
            <div class="custom-controls-stacked font_setting">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-opensans" checked="">
                    <span class="custom-control-label">Open Sans Font</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-montserrat">
                    <span class="custom-control-label">Montserrat Google Font</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-poppins">
                    <span class="custom-control-label">Poppins Google Font</span>
                </label>
            </div>
        </div>
        <div class="mb-4">
            <h6 class="font-14 font-weight-bold text-muted">Dropdown Menu Icon</h6>
            <div class="custom-controls-stacked arrow_option">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="marrow" value="arrow-a" checked="">
                    <span class="custom-control-label">A</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                    <span class="custom-control-label">B</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="marrow" value="arrow-c">
                    <span class="custom-control-label">C</span>
                </label>
            </div>
            <h6 class="font-14 font-weight-bold mt-4 text-muted">SubMenu List Icon</h6>
            <div class="custom-controls-stacked list_option">
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                    <span class="custom-control-label">A</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                    <span class="custom-control-label">B</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                    <span class="custom-control-label">C</span>
                </label>
            </div>
        </div>
        <div>
            <h6 class="font-14 font-weight-bold mt-4 text-muted">General Settings</h6>
            <ul class="setting-list list-unstyled mt-1 setting_switch">
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Night Mode</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Fix Navbar top</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Header Dark</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Min Sidebar Dark</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Sidebar Dark</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar" checked="">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Icon Color</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor" checked="">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Gradient Color</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
                <li>
                    <label class="custom-switch">
                        <span class="custom-switch-description">Box Shadow</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>
