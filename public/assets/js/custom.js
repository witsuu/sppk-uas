/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$("#close-toast").on("click", function () {
    $(".toast").fadeOut();
});

$("#dataTable").DataTable({
    ordering: false,
    info: false,
});

$("#dataTablePenilaian").DataTable({
    ordering: false,
    info: false,
});
