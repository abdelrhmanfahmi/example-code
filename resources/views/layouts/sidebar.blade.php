
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Employee System</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="/home" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>

            @role('manager')
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Users</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="/employees" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Users</span></a>
                        </li>
                        <li>
                            <a href="/employees/create" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Add User</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Departments</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="/departments" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Departments</span></a>
                        </li>
                        <li>
                            <a href="/departments/create" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Add Department</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Tasks</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="/tasks" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Tasks</span></a>
                        </li>
                        <li>
                            <a href="/tasks/create" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Add Task</span></a>
                        </li>
                    </ul>
                </li>
            @endrole

            @role('employee')
                <li>
                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Employee Tasks</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="/get/user/tasks" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Employee Tasks</span></a>
                        </li>
                    </ul>
                </li>
            @endrole

            <li>
                <a href="/logout" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Sign Out</span> </a>
            </li>
        </ul>
    </div>
</div>
