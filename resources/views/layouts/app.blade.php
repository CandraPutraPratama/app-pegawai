<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Kepegawaian')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('custom.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <a class="navbar-brand">
                <i class="bi bi-people-fill me-2"></i>DATA PEGAWAI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is('employees*')) active @endif" href="{{ route('employees.index') }}">
                            <i class="bi bi-person-badge me-1"></i>Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/departments') }}">
                            <i class="bi bi-building me-1"></i>Department
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/attendance') }}">
                            <i class="bi bi-calendar-check me-1"></i>Attendance
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="custom-footer">
        <div class="container text-center">
            <p class="mb-0">
                <i class="bi bi-c-circle me-1"></i> 2025 Data Pegawai. Candra Putra Pratama
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showSuccessAlert(message) {
            const alert = document.getElementById('successAlert');
            const messageSpan = document.getElementById('successMessage');
            messageSpan.textContent = message;
            alert.classList.remove('d-none');

            setTimeout(() => {
                alert.classList.add('d-none');
            }, 5000);
        }

        @if(session('success'))
        showSuccessAlert("{{ session('success') }}");
        @endif
    </script>

    @yield('js-scripts')
</body>

</html>