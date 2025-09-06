<!DOCTYPE html>
<html lang="en">
<head>
<style>
  body {
    background: #f8f9fa;
  }

  h3 {
    color: #198754; /* Bootstrap green */
    font-weight: bold;
  }

  /* Table styling */
  .table {
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  .table thead {
    background: #198754; /* Green header */
    color: white;
  }

  .table tbody tr:hover {
    background: #e9f7ef; /* light green hover */
  }

  /* Modals */
  .modal-content {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  .modal-header {
    background: #198754;
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  .modal-footer {
    background: #f1f1f1;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
  }

  /* Buttons */
  .btn-success,
  .btn-primary {
    background-color: #198754;
    border-color: #198754;
  }

  .btn-success:hover,
  .btn-primary:hover {
    background-color: #157347;
    border-color: #146c43;
  }

  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
  }

  /* Pagination */
  .page-link {
    color: #198754;
  }

  .page-item.active .page-link {
    background-color: #198754;
    border-color: #198754;
  }
</style>


  <meta charset="UTF-8">
  <title>Student Information</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Toastr -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Student Information</h3>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create-item">+ Add Student</button>
  </div>

  <!-- Filters -->
  <div class="row mb-3">
    <div class="col"><input id="filter-name" class="form-control" placeholder="Filter by Name"></div>
    <div class="col"><input id="filter-enroll" class="form-control" placeholder="Filter by Enrollment"></div>
    <div class="col"><input id="filter-course" class="form-control" placeholder="Filter by Course"></div>
    <div class="col"><input id="filter-city" class="form-control" placeholder="Filter by City"></div>
    <div class="col"><input id="filter-state" class="form-control" placeholder="Filter by State"></div>
  </div>

  <!-- Table -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Enrollment</th>
        <th>Course</th>
        <th>City</th>
        <th>State</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="student-body"></tbody>
  </table>

  <nav><ul class="pagination" id="pagination"></ul></nav>
</div>

<!-- Create Student Modal -->
<div class="modal fade" id="create-item" tabindex="-1">
  <div class="modal-dialog">
    <form id="form-create" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" name="s_name" placeholder="Name" required>
        <div class="invalid-feedback">Name is required</div>
        <input type="text" class="form-control mb-2" name="s_entrollment" placeholder="Enrollment" required>
        <div class="invalid-feedback">Enrollment is required</div>
        <input type="text" class="form-control mb-2" name="s_course" placeholder="Course" required>
        <div class="invalid-feedback">Course is required</div>
        <input type="text" class="form-control mb-2" name="s_city" placeholder="City" required>
        <div class="invalid-feedback">City is required</div>
        <input type="text" class="form-control mb-2" name="s_state" placeholder="State" required>
        <div class="invalid-feedback">State is required</div>
      </div>
      <div class="modal-footer"><button type="submit" class="btn btn-primary">Save</button></div>
    </form>
  </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="edit-item" tabindex="-1">
  <div class="modal-dialog">
    <form id="form-edit" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id">
        <input type="text" class="form-control mb-2" name="s_name" placeholder="Name" required>
        <div class="invalid-feedback">Name is required</div>
        <input type="text" class="form-control mb-2" name="s_entrollment" placeholder="Enrollment" required>
        <div class="invalid-feedback">Enrollment is required</div>
        <input type="text" class="form-control mb-2" name="s_course" placeholder="Course" required>
        <div class="invalid-feedback">Course is required</div>
        <input type="text" class="form-control mb-2" name="s_city" placeholder="City" required>
        <div class="invalid-feedback">City is required</div>
        <input type="text" class="form-control mb-2" name="s_state" placeholder="State" required>
        <div class="invalid-feedback">State is required</div>
      </div>
      <div class="modal-footer"><button type="submit" class="btn btn-primary">Update</button></div>
    </form>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="students-ajax.js"></script>

<script>
// Bootstrap validation
(function () {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        toastr.error("Please fill all required fields correctly!");
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
</body>
</html>
