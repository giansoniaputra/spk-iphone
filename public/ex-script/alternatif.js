$(document).ready(function () {
    let table = $("#table-alternatif").DataTable({
        responsive: true,
        responsive: !0,
        autoWidth: false,
        serverSide: true,
        ajax: {
            url: "/dataTablesAlternatif",
        },
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row, meta) {
                    var pageInfo = $("#table-alternatif").DataTable().page.info();
                    var index = meta.row + pageInfo.start + 1;
                    return index;
                },
            },
            {
                data: "alternatif",
            },
            {
                data: "keterangan",
            },
            {
                data: "action",
                orderable: true,
                searchable: true,
            },
        ],
        columnDefs: [
            {
                targets: [3], // index kolom atau sel yang ingin diatur
                className: "text-center", // kelas CSS untuk memposisikan isi ke tengah
            },
            {
                searchable: false,
                orderable: false,
                targets: 0, // Kolom nomor, dimulai dari 0
            },
        ],
    });
    // Ketika Tombol Tambah Di Klik
    $("#btn-add-data").on("click", function () {
        $("#modal-alternatif").modal("show");
        $("#modal-title").html("Tambah Data Alternatif")
        $("#btn-action").html(`
            <button class="btn btn-primary" id="btn-save">Tambah</button>
        `)
    })

    $("#modal-alternatif").on("click", "#btn-save", function () {
        let form = $("form[id='form-alternatif']").serialize();
        $.ajax({
            data: form,
            url: "/alternatif-store",
            type: "POST",
            dataType: 'json',
            success: function (response) {
                if (response.errors) {
                    displayErrors(response.errors);
                } else {
                    table.ajax.reload()
                    $("#alternatif").val("")
                    $("#keterangan").val("")
                    $("#modal-alternatif").modal("hide");
                    Swal.fire("Success!", response.success, "success");
                }
            }
        });

    })

    $("#btn-close").on("click", function () {
        $("#alternatif").val("")
        $("#keterangan").val("")
        $("#current_uuid").val("")
        $("#modal-alternatif").modal("hide");
    })

    $("#table-alternatif").on("click", ".edit-button", function () {
        let uuid = $(this).data("uuid");
        $("#current_uuid").val(uuid)
        $.ajax({
            url: "/alternatif-edit/" + uuid,
            type: "GET",
            dataType: 'json',
            success: function (response) {
                $("#modal-title").html("Ubah Data Alternatif")
                $("#btn-action").html(`
                    <button class="btn btn-primary" id="btn-update">Ubah</button>
                `)
                $("#alternatif").val(response.data.alternatif)
                $("#keterangan").val(response.data.keterangan)
                $("#modal-alternatif").modal("show");
            }
        });
    })

    $("#modal-alternatif").on("click", "#btn-update", function () {
        let form = $("form[id='form-alternatif']").serialize();
        $.ajax({
            data: form,
            url: "/alternatif-update/" + $("#current_uuid").val(),
            type: "POST",
            dataType: 'json',
            success: function (response) {
                if (response.errors) {
                    displayErrors(response.errors);
                } else {
                    table.ajax.reload()
                    $("#alternatif").val("")
                    $("#keterangan").val("")
                    $("#current_uuid").val("")
                    $("#modal-alternatif").modal("hide");
                    Swal.fire("Success!", response.success, "success");
                }
            }
        });
    })
    //HAPUS DATA
    $("#table-alternatif").on("click", ".delete-button", function () {
        let uuid = $(this).attr("data-uuid");
        let token = $(this).attr("data-token");
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Kamu akan menghapus data alternatif!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    data: {
                        _token: token,
                    },
                    url: "/alternatif-destroy/" + uuid,
                    type: "POST",
                    dataType: "json",
                    success: function (response) {
                        table.ajax.reload();
                        Swal.fire("Deleted!", response.success, "success");
                    },
                });
            }
        });
    });
    //Hendler Error
    function displayErrors(errors) {
        // menghapus class 'is-invalid' dan pesan error sebelumnya
        $("input.form-control").removeClass("is-invalid");
        $("select.form-control").removeClass("is-invalid");
        $("div.invalid-feedback").remove();

        // menampilkan pesan error baru
        $.each(errors, function (field, messages) {
            let inputElement = $("input[name=" + field + "]");
            let selectElement = $("select[name=" + field + "]");
            let textAreaElement = $("textarea[name=" + field + "]");
            let feedbackElement = $(
                '<div class="invalid-feedback ml-2"></div>'
            );

            $("#btn-close").on("click", function () {
                inputElement.each(function () {
                    $(this).removeClass("is-invalid");
                });
                textAreaElement.each(function () {
                    $(this).removeClass("is-invalid");
                });
                selectElement.each(function () {
                    $(this).removeClass("is-invalid");
                });
            });

            $.each(messages, function (index, message) {
                feedbackElement.append(
                    $('<p class="p-0 m-0 text-center">' + message + "</p>")
                );
            });

            if (inputElement.length > 0) {
                inputElement.addClass("is-invalid");
                inputElement.after(feedbackElement);
            }

            if (selectElement.length > 0) {
                selectElement.addClass("is-invalid");
                selectElement.after(feedbackElement);
            }
            if (textAreaElement.length > 0) {
                textAreaElement.addClass("is-invalid");
                textAreaElement.after(feedbackElement);
            }
            inputElement.each(function () {
                if (inputElement.attr("type") == "text" || inputElement.attr("type") == "number") {
                    inputElement.on("click", function () {
                        $(this).removeClass("is-invalid");
                    });
                    inputElement.on("change", function () {
                        $(this).removeClass("is-invalid");
                    });
                } else if (inputElement.attr("type") == "date") {
                    inputElement.on("change", function () {
                        $(this).removeClass("is-invalid");
                    });
                } else if (inputElement.attr("type") == "password") {
                    inputElement.on("click", function () {
                        $(this).removeClass("is-invalid");
                    });
                } else if (inputElement.attr("type") == "email") {
                    inputElement.on("click", function () {
                        $(this).removeClass("is-invalid");
                    });
                }
            });
            textAreaElement.each(function () {
                textAreaElement.on("click", function () {
                    $(this).removeClass("is-invalid");
                });
            });
            selectElement.each(function () {
                selectElement.on("change", function () {
                    $(this).removeClass("is-invalid");
                });
            });
        });
    }
});