// require('select2');

window._ = require('lodash');

require('select2/dist/js/select2.full');
require('datatables.net/js/jquery.dataTables');
require('datatables.net-responsive-bs4/js/responsive.bootstrap4');
require('sweetalert2/dist/sweetalert2.all');

window.Quill = require('quill');
require('quill/core/quill');
let Toolbar = require('quill/modules/toolbar');

$(document).ready(function() {
  // DataTable Configuration
  if ($('.datatable').length > 0) {
    $('.datatable').DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
    });
  }

  if ($('.select2').length > 0) {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4',
      placeholder: '-- Select --',
    });
  }

  if ($('.multiple').length > 0) {
    $('.multiple').select2({
      theme: 'bootstrap4',
      tags: true,
    });
  }

  if ($('#quill-editor').length > 0) {
    let editor = new Quill('#quill-editor', {
      theme: 'snow',
      toolbar: Toolbar,
    });

    if ($('.q-editor').val().length < 1) {
      const { template } = require('./vendor/job-template');
      editor.setContents(template);
    }

    if ($('.ql-input-hidden').val().length > 0) {
      editor.setContents(JSON.parse($('.ql-input-hidden').val()));
    } else {
      // editor.root.innerHTML = $('.q-editor').val();
    }

    editor.on('text-change', () => {
      const html = editor.root.innerHTML;

      $('.ql-input-hidden').val(JSON.stringify(editor.getContents()));
      $('.q-editor').val(html);
    });
  }
});
