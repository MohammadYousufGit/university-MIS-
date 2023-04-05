
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
          <i class="bi bi-menu-button-wide"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  route('senf-students.show', Auth::user()) }}" >
              <i class="bi bi-circle"></i><span>Next Exams</span>
            </a>
          </li>
          <li>
            <a href="{{ route('students.index') }}">
              <i class="bi bi-circle"></i><span>Exam Results</span>
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
        <a class="nav-link collapsed" data-bs-target="#finance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-coin"></i><span>Payments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="finance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('payments.paid') }}">
              <i class="bi bi-circle"></i><span>Paid Payments</span>
            </a>
          </li>

          <li>
            <a href="{{ route('payments.index') }}">
              <i class="bi bi-circle"></i><span>Unpaid Paiments</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bills.create') }}">
              <i class="bi bi-circle"></i><span>Payment Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


    </ul>

  </aside>
