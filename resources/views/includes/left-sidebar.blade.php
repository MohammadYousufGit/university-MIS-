
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('students.create') }}" >
              <i class="bi bi-circle"></i><span>Register New Student</span>
            </a>
          </li>
          <li>
            <a href="{{ route('students.index') }}">
              <i class="bi bi-circle"></i><span>Students List</span>
            </a>
          </li>
          {{-- <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Search Student</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#management-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="management-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('faculties.index')}}">
              <i class="bi bi-circle"></i><span>Faculties List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('departments.index')}}">
              <i class="bi bi-circle"></i><span>Department List</span>
            </a>
          </li>

          <li>
            <a href="{{ route('subjects.create') }}">
              <i class="bi bi-circle"></i><span>Create New Subject</span>
            </a>
          </li>
          <li>
            <a href="{{ route('subjects.index') }}">
              <i class="bi bi-circle"></i><span>Subjects List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('senfs.create') }}">
              <i class="bi bi-circle"></i><span>Create New Class</span>
            </a>
          </li>
          <li>
            <a href="{{ route('senfs.index') }}">
              <i class="bi bi-circle"></i><span>Class List</span>
            </a>
          </li>
          {{-- <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Assign Class Subjects</span>
            </a>
          </li> --}}

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#finance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-coin"></i><span>Finance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="finance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('payments.paid') }}">
              <i class="bi bi-circle"></i><span>Paid Students List</span>
            </a>
          </li>

          <li>
            <a href="{{ route('payments.index') }}">
              <i class="bi bi-circle"></i><span>Unpaid Students List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bills.create') }}">
              <i class="bi bi-circle"></i><span>Payment Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#exam-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-square"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="exam-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('exams.create') }}">
              <i class="bi bi-circle"></i><span>New Exam</span>
            </a>
          </li>
          <li>
            <a href="{{ route('exams.index') }}">
              <i class="bi bi-circle"></i><span>Exam List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('results.index') }}">
              <i class="bi bi-circle"></i><span>Exam Results List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#announcement-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-megaphone"></i><span>Announcement</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="announcement-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>New Announcement</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Announcement List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#attendance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil"></i><span>Students Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="attendance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('attendances.index') }}">
              <i class="bi bi-circle"></i><span>Daily Clases' Attedance</span>
            </a>
          </li>
          <li>
            <a href="{{ route('attendances.report') }}">
              <i class="bi bi-circle"></i><span>Attedance Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#teacher-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-fill"></i><span>Teachers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="teacher-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('teachers.create') }}">
              <i class="bi bi-circle"></i><span>Add New Teacher</span>
            </a>
          </li>
          <li>
            <a href="{{ route('teachers.index') }}">
              <i class="bi bi-circle"></i><span>Teacher List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('users.index')}}">
              <i class="bi bi-circle"></i><span>All Users</span>
            </a>
          </li>
          <li>
            <a href="{{ route('users.create')}}">
              <i class="bi bi-circle"></i><span>New User</span>
            </a>
          </li>
          <li>
            <a href="{{ route('roles.index')}}">
              <i class="bi bi-circle"></i><span>Roles</span>
            </a>
          </li>
          <li>
            <a href="{{ route('permissions.index')}}">
              <i class="bi bi-circle"></i><span>Permission</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#website-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxl-chrome"></i><span>Website Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="website-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/admin/slider')}}">
              <i class="bi bi-circle"></i><span>Slider</span>
            </a>
          </li>
          <li>
            <a href="{{url('/admin/news')}}">
              <i class="bi bi-circle"></i><span>News & Events</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/gallery')}}">
              <i class="bi bi-circle"></i><span>Media & Gallery</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside>
