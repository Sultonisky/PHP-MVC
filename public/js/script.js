$(document).ready(function () {
  // Ubah judul modal & kosongkan form ketika tombol "Add" diklik
  $(".addModalBtn").on("click", function () {
    $("#modalEditLabel").text("Form Add Data");
    $(".modal-footer button[type=submit]").text("Add Data");

    // Kosongkan semua input dalam modal
    $("#name").val("");
    $("#nim").val("");
    $("#email").val("");
    $("#program").val("");
  });

  // Ubah judul modal & isi data ketika tombol "Edit" diklik
  $(".modalEditBtn").on("click", function () {
    $("#modalEditLabel").text("Form Edit Data");
    $(".modal-footer button[type=submit]").text("Edit Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/MVC-PHP/public/data/edit"
    );

    const id = $(this).data("id"); // Ambil data-id dari tombol

    $.ajax({
      url: "http://localhost/MVC-PHP/public/data/getEdit",
      data: { id: id },
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#name").val(data.name);
        $("#nim").val(data.nim);
        $("#email").val(data.email);
        $("#program").val(data.program);
      },
    });
  });

  // Tangani tombol delete agar mengisi input hidden dalam modal
  $(".delete-button").on("click", function () {
    const id = $(this).data("id"); // Ambil data-id dari tombol
    $("#delete-id").val(id); // Masukkan ke input hidden
  });
});
