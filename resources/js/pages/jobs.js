require('bootstrap/dist/js/bootstrap')
require('bootstrap/dist/js/bootstrap.bundle')
require('summernote');
require('summernote/dist/summernote.css');
require('summernote/dist/summernote.js');

require('select2');
require('select2/dist/js/select2.full');
require('suggestags');
require('suggestags/js/jquery.amsify.suggestags');

require('datatables.net');
require('datatables.net-bs4');
require('datatables.net-responsive-bs4');
require('datatables.net-select-bs4')
require('jszip');
require('jszip/dist/jszip');
require('pdfmake');
require('pdfmake/build/pdfmake');
require('pdfmake/build/vfs_fonts');
require('sweetalert2');
require('sweetalert2/dist/sweetalert2.all');

$(document).ready(function () {
  // DataTable Configuration
  $(".datatable").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
  })

  // Summernote Cofniguration
  $('.summernote').summernote({
    height: 150,
    placeholder: 'Write an epic description...'
  });

  //Initialize Select2 Elements
  $('.select2').select2({
    theme: 'bootstrap4',
    placeholder: "-- Select --"
  });
})
