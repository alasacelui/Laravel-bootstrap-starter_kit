const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    // Activity Logs
    // if (window.location.href === route("city_admin.activity.index")) {
    //     const activitylog_data = [
    //         { data: "id" },
    //         { data: "description" },
    //         {
    //             data: "created_at",
    //             render(data) {
    //                 return formatDate(data, "datetime");
    //             },
    //         },
    //         { data: "actions", orderable: false, searchable: false },
    //     ];
    //     c_index(
    //         $(".activitylog_dt"),
    //         route("city_admin.activity.index"),
    //         activitylog_data
    //     );
    // }
});

//=========================================================
// Custom Functions()

//===============================================================================
// crud function

async function c_index(dt, route, column) {
    //axios.get("/admin/booking").then((res) => log(res));

    $(dt).DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        autoWidth: false,
        ajax: route,
        columns: column,
        dom: "Bfrtip",
        // buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5", "print"],
        buttons: {
            dom: {
                button: {
                    className: "btn btn_green btn-sm btn-rounded mb-2",
                },
            },
            buttons: [
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5",
                "print",
            ],
            position: "bottom",
        },
    });
}

// activate - deactivate status
function crud_activate_deactivate(id, route_name, value, dt, msg) {
    Swal.fire({
        title: `Do you want to ${msg}?`,
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: `Yes, ${value} it!`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .put(route(route_name, id), { option: value })
                .then((res) => {
                    $(dt).DataTable().draw();
                    success(`${value} successfully`);
                })
                .catch((err) => error(err));
        }
    });
}

// crud create
function toggle_modal(modal, form, modal_title, buttons, opt = "") {
    // if there is an optional parameter then execute the query
    // opt [route_name, element target (where to append the data)]
    if (opt) {
        axios.get(route(opt.rname)).then((res) => {
            $(opt.target).html(
                displayDataToSelectInputField(res.data.results, "name")
            ); // append the patient data []
        });
    }

    $(modal).modal("show"); // show modal dialog
    $(form)[0].reset(); // clear input field
    $(modal_title[0]).html(
        `${modal_title[1]} <i class="fas fa-plus-circle ms-2"></i> `
    );
    $(".modal-header").removeClass("bg_navy_blue").addClass("bg_green");
    $(buttons[0]).css("display", "block"); // add button
    $(buttons[1]).css("display", "none"); // update button
}

async function c_store(form, dt, route_name) {
    // Validation
    let bool;

    $(`${form} *`)
        .filter(":input")
        .each(function () {
            // loop through each element & apply sanitation
            if (isNotEmpty($(this))) {
                bool = true;
            }
        });

    if (bool) {
        // convert the first form in the parameter into a form data object
        const form_data = new FormData($(form)[0]);

        try {
            // request
            const res = await axios.post(route(route_name), form_data);
            success(res.data.message);
            $(form)[0].reset(); // clear input field
            pond ? pond.removeFiles() : "";
            $(dt).DataTable().draw(); // update dt
        } catch (e) {
            const responses = e.response.data.errors;
            if (responses) {
                const errors = Object.values(responses);
                errors.forEach((e) => {
                    toastDanger(e);
                });
            } else {
                error(e.response.data.message);
            }
        }
    }
}

// crud edit
function c_edit(modal, form, modal_title, buttons, model, opt = "") {
    // if there is an optional parameter then execute the query
    // opt [route_name, element target (where to append the data)]
    if (opt) {
        axios.get(route(opt.rname)).then((res) => {
            let data = `<option value='${model.category_id}'>${model.category} (Current)</option>`;
            res.data.results.forEach((category) => {
                data += `<option value='${category.id}'>${category.category}</option>`;
            });
            $(opt.target).html(data); // append the category data []
        });
    }

    // continue
    $(modal).modal("show");
    $(".yes").attr("checked", false); // clear first
    $(".no").attr("checked", false);
    $(".modal-header")
        .removeClass("bg_green")
        .addClass("bg_navy_blue text-white");
    $(modal_title[0]).html(
        `${modal_title[1]} <i class="fas fa-edit ms-1"></i> `
    );
    $(buttons[0]).css("display", "none"); // add button
    $(buttons[1]).css("display", "block").attr("data-id", model.id); // show update button and append a model id to it

    const key_val = Object.entries(model); // ex output (6) [ 0:{0:id, 1:test}, 1:{0:id, 1:test2}]

    const form_field = $(form); // get all input field inside a form

    // loop each input fields and find its match input name to the model instance
    form_field.each((key, val) => {
        key_val.forEach((k) => {
            if (
                val.type == "text" ||
                val.type == "number" ||
                val.type == "select-one" ||
                val.type == "radio" ||
                val.type == "date" ||
                val.type == "email" ||
                val.type == "time" ||
                val.type == "textarea"
            ) {
                // check if the input type name is equal to the database key ex input name='email' db column name = email
                if (k[0] == val.name) {
                    //check if its not a radio button
                    // append a value
                    if (val.type !== "radio") {
                        val.value = k[1];
                    } else {
                        // if the value of the radio buttons are set to true . assign checked prop to the 'yes' radio btn
                        if (k[1] == 1) {
                            $(".yes").attr("checked", true);
                        } else {
                            // else assign checked prop to the 'no' radio btn
                            $(".no").attr("checked", true);
                        }
                    }
                }
            }
        });
    });
}

// crud update
async function c_update(form, dt, route_name, event, opt = "") {
    // if there is an optional param then do the confirmation
    if (opt) {
        const result = await confirm(
            opt.title,
            opt.text ?? "",
            opt.confirmTxt,
            "warning"
        );
        if (result.isConfirmed) {
            // convert the first form in the parameter into a form data object
            const form_data = new FormData($(form)[0]);
            form_data.append("_method", "PUT");
            const model_id = event.target.getAttribute("data-id");

            try {
                // request
                const res = await axios.post(
                    `${route(route_name, model_id)}`,
                    form_data
                ); // fake update request
                success(res.data.message);
                //pond.removeFiles();
                $(dt).DataTable().draw(); // update dt
            } catch (e) {
                const responses = e.response.data.errors;
                if (responses) {
                    const errors = Object.values(responses);
                    errors.forEach((e) => {
                        toastDanger(e);
                    });
                } else {
                    error(e.response.data.message);
                }
            }
        }
    } else {
        // convert the first form in the parameter into a form data object
        const form_data = new FormData($(form)[0]);
        form_data.append("_method", "PUT");
        const model_id = event.target.getAttribute("data-id");

        try {
            // request
            const res = await axios.post(
                `${route(route_name, model_id)}`,
                form_data
            ); // fake update request
            success(res.data.message);
            //pond.removeFiles();
            $(dt).DataTable().draw(); // update dt
        } catch (e) {
            const responses = e.response.data.errors;
            if (responses) {
                const errors = Object.values(responses);
                errors.forEach((e) => {
                    toastDanger(e);
                });
            } else {
                error(e.response.data.message);
            }
        }
    }
}

// crud destroy
async function c_destroy(id, routename, dt) {
    const result = await confirm();
    if (result.isConfirmed) {
        try {
            const res = await axios.delete(route(routename, id));
            success(res.data.message);
            $(dt).DataTable().draw(); // update dt
        } catch (e) {
            const responses = e.response.data.errors;
            if (responses) {
                const errors = Object.values(responses);
                errors.forEach((e) => {
                    toastDanger(e);
                });
            } else {
                error(e.response.data.message);
            }
        }
    }
}
