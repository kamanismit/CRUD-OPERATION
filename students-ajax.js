$(function () {
    let currentPage = 1;

    function load(page = 1) {
        $.getJSON("api/read.php", { page }, function (res) {
            const rows = res.students.map(s => `
                <tr>
                    <td>${s.id}</td>
                    <td>${s.s_name}</td>
                    <td>${s.s_entrollment}</td>
                    <td>${s.s_course}</td>
                    <td>${s.s_city}</td>
                    <td>${s.s_state}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary btn-edit"
                                data-id="${s.id}"
                                data-name="${s.s_name}"
                                data-entrollment="${s.s_entrollment}"
                                data-course="${s.s_course}"
                                data-city="${s.s_city}"
                                data-state="${s.s_state}">Edit</button>
                        <button class="btn btn-sm btn-outline-danger btn-del" data-id="${s.id}">Delete</button>
                    </td>
                </tr>
            `);
            $("#student-body").html(rows.join(""));

            // pagination
            let pag = "";
            for (let i = 1; i <= res.pages; i++) {
                pag += `<li class="page-item ${i===page?'active':''}">
                            <a class="page-link" href="#">${i}</a>
                        </li>`;
            }
            $("#pagination").html(pag);
            currentPage = page;
        });
    }
    load();

    // pagination click
    $(document).on("click", "#pagination a", function (e) {
        e.preventDefault();
        load(parseInt($(this).text()));
    });

    // create
    $("#form-create").submit(function (e) {
        e.preventDefault();
        if (!this.checkValidity()) return;
        $.post("api/create.php", $(this).serialize(), function () {
            toastr.success("Student added");
            $("#create-item").modal("hide");
            load(currentPage);
            $("#form-create")[0].reset();
        });
    });

    // edit fill
    $(document).on("click", ".btn-edit", function () {
        const btn = $(this);
        const modal = $("#edit-item");
        modal.find("input[name=id]").val(btn.data("id"));
        modal.find("input[name=s_name]").val(btn.data("name"));
        modal.find("input[name=s_entrollment]").val(btn.data("entrollment"));
        modal.find("input[name=s_course]").val(btn.data("course"));
        modal.find("input[name=s_city]").val(btn.data("city"));
        modal.find("input[name=s_state]").val(btn.data("state"));
        new bootstrap.Modal(modal[0]).show();
    });

    // update
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        if (!this.checkValidity()) return;
        $.post("api/update.php", $(this).serialize(), function () {
            toastr.success("Student updated");
            $("#edit-item").modal("hide");
            load(currentPage);
        });
    });

    // delete
    $(document).on("click", ".btn-del", function () {
        if (!confirm("Delete this student?")) return;
        $.post("api/delete.php", { id: $(this).data("id") }, function () {
            toastr.success("Deleted");
            load(currentPage);
        });
    });
});

// client-side filter
function applyFilters() {
    const name    = $("#filter-name").val().toLowerCase();
    const enroll  = $("#filter-enroll").val().toLowerCase();
    const course  = $("#filter-course").val().toLowerCase();
    const city    = $("#filter-city").val().toLowerCase();
    const state   = $("#filter-state").val().toLowerCase();

    $("#student-body tr").each(function () {
        const row = $(this);
        const t_name = row.find("td:eq(1)").text().toLowerCase();
        const t_enr  = row.find("td:eq(2)").text().toLowerCase();
        const t_course = row.find("td:eq(3)").text().toLowerCase();
        const t_city = row.find("td:eq(4)").text().toLowerCase();
        const t_state = row.find("td:eq(5)").text().toLowerCase();

        if (
            t_name.includes(name) &&
            t_enr.includes(enroll) &&
            t_course.includes(course) &&
            t_city.includes(city) &&
            t_state.includes(state)
        ) {
            row.show();
        } else {
            row.hide();
        }
    });
}

$("#filter-name, #filter-enroll, #filter-course, #filter-city, #filter-state").on("keyup", applyFilters);
