<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

   <style>
    body { background: #f4f6f9; font-family: "Segoe UI", sans-serif; }
    h2 { font-weight: 700; color: #198754; } /* dark green title */

    .card { border-radius: 15px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .table thead th { background: linear-gradient(45deg, #198754, #157347); color: white; border: none; }
    .table tbody tr:hover { background: #e6f4ea; }

    /* Rounded green buttons */
    .btn {
        border-radius: 7px; /* full rounded pill */
        padding: 8px 20px;
        font-weight: 500;
    }
    .btn-primary {
        background: linear-gradient(45deg, #198754, #157347);
        border: none;
        color: white;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #157347, #116233);
        color: white;
    }

    /* Modal styling */
    .modal-content { border-radius: 15px; overflow: hidden; }
    .modal-header { background: linear-gradient(45deg, #198754, #157347); color: white; }

    /* Pagination */
    .pagination .page-link { background:#157347; border-radius: 1%; margin: 0 4px; color: #ffff;}
</style>

</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h2><i class="bi bi-mortarboard-fill"></i> Student Information</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-item">
            <i class="bi bi-plus-lg"></i> Add Student
        </button>
    </div>

    <div class="mb-3 row g-2">
    <div class="col-md">
        <input type="text" id="filter-name" class="form-control" placeholder="Search Name">
    </div>
    <div class="col-md">
        <input type="text" id="filter-enroll" class="form-control" placeholder="Search Enrollment">
    </div>
    <div class="col-md">
        <input type="text" id="filter-course" class="form-control" placeholder="Search Course">
    </div>
    <div class="col-md">
        <input type="text" id="filter-city" class="form-control" placeholder="Search City">
    </div>
    <div class="col-md">
        <input type="text" id="filter-state" class="form-control" placeholder="Search State">
    </div>
</div>


    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Enrollment</th>
                    <th>Course</th>
                    <th>City</th>
                    <th>State</th>
                    <th width="180px">Action</th>
                </tr>
                </thead>
                <tbody id="student-body"></tbody>
            </table>
        </div>
        <ul id="pagination" class="pagination justify-content-center mt-3"></ul>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="create-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-create">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control mb-2" name="s_name" placeholder="Name" required>
                    <input class="form-control mb-2" name="s_entrollment" placeholder="Enrollment" required>
                    <input class="form-control mb-2" name="s_course" placeholder="Course" required>
                    <input class="form-control mb-2" name="s_city" placeholder="City" required>
                    <input class="form-control mb-2" name="s_state" placeholder="State" required>
                </div>
                <div class="modal-footer"><button class="btn btn-primary">Save</button></div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-edit">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <input class="form-control mb-2" name="s_name" placeholder="Name" required>
                    <input class="form-control mb-2" name="s_entrollment" placeholder="Enrollment" required>
                    <input class="form-control mb-2" name="s_course" placeholder="Course" required>
                    <input class="form-control mb-2" name="s_city" placeholder="City" required>
                    <input class="form-control mb-2" name="s_state" placeholder="State" required>
                </div>
                <div class="modal-footer"><button class="btn btn-primary">Update</button></div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="js/students-ajax.js"></script>
</body>
</html>
