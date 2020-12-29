'use strict'

const Plugins = [
  // jQuery
  {
    from: 'node_modules/jquery/dist',
    to: 'public/plugins/jquery'
  },
  // Popper
  {
    from: 'node_modules/popper.js/dist',
    to: 'public/plugins/popper'
  },
  // Bootstrap
  {
    from: 'node_modules/bootstrap/dist/js',
    to: 'public/plugins/bootstrap/js'
  },
  // Font Awesome
  {
    from: 'node_modules/@fortawesome/fontawesome-free/css',
    to: 'public/plugins/fontawesome-free/css'
  },
  {
    from: 'node_modules/@fortawesome/fontawesome-free/webfonts',
    to: 'public/plugins/fontawesome-free/webfonts'
  },
  // overlayScrollbars
  {
    from: 'node_modules/overlayscrollbars/js',
    to: 'public/plugins/overlayScrollbars/js'
  },
  {
    from: 'node_modules/overlayscrollbars/css',
    to: 'public/plugins/overlayScrollbars/css'
  },
  // Summernote
  {
    from: 'node_modules/summernote/dist/',
    to: 'public/plugins/summernote'
  },
  // Tempusdominus Bootstrap 4
  {
    from: 'node_modules/tempusdominus-bootstrap-4/build/js',
    to: 'public/plugins/tempusdominus-bootstrap-4/js'
  },
  {
    from: 'node_modules/tempusdominus-bootstrap-4/build/css',
    to: 'public/plugins/tempusdominus-bootstrap-4/css'
  },
  // Moment
  {
    from: 'node_modules/moment/min',
    to: 'public/plugins/moment'
  },
  {
    from: 'node_modules/moment/locale',
    to: 'public/plugins/moment/locale'
  },
  // DataTables
  {
    from: 'node_modules/pdfmake/build',
    to: 'public/plugins/pdfmake'
  },
  {
    from: 'node_modules/jszip/dist',
    to: 'public/plugins/jszip'
  },
  {
    from: 'node_modules/datatables.net/js',
    to: 'public/plugins/datatables'
  },
  {
    from: 'node_modules/datatables.net-bs4/js',
    to: 'public/plugins/datatables-bs4/js'
  },
  {
    from: 'node_modules/datatables.net-bs4/css',
    to: 'public/plugins/datatables-bs4/css'
  },
  {
    from: 'node_modules/datatables.net-buttons/js',
    to: 'public/plugins/datatables-buttons/js'
  },
  {
    from: 'node_modules/datatables.net-buttons-bs4/js',
    to: 'public/plugins/datatables-buttons/js'
  },
  {
    from: 'node_modules/datatables.net-buttons-bs4/css',
    to: 'public/plugins/datatables-buttons/css'
  },
  {
    from: 'node_modules/datatables.net-responsive/js',
    to: 'public/plugins/datatables-responsive/js'
  },
  {
    from: 'node_modules/datatables.net-responsive-bs4/js',
    to: 'public/plugins/datatables-responsive/js'
  },
  {
    from: 'node_modules/datatables.net-responsive-bs4/css',
    to: 'public/plugins/datatables-responsive/css'
  },
  {
    from: 'node_modules/datatables.net-select/js',
    to: 'public/plugins/datatables-select/js'
  },
  {
    from: 'node_modules/datatables.net-select-bs4/js',
    to: 'public/plugins/datatables-select/js'
  },
  {
    from: 'node_modules/datatables.net-select-bs4/css',
    to: 'public/plugins/datatables-select/css'
  },
  // icheck bootstrap
  {
    from: 'node_modules/icheck-bootstrap/',
    to: 'public/plugins/icheck-bootstrap'
  },
  // inputmask
  {
    from: 'node_modules/inputmask/dist/',
    to: 'public/plugins/inputmask'
  },
  // Select2
  {
    from: 'node_modules/select2/dist/',
    to: 'public/plugins/select2'
  },
  {
    from: 'node_modules/@ttskch/select2-bootstrap4-theme/dist/',
    to: 'public/plugins/select2-bootstrap4-theme'
  },
  // SweetAlert2
  {
    from: 'node_modules/sweetalert2/dist/',
    to: 'public/plugins/sweetalert2'
  },
  {
    from: 'node_modules/@sweetalert2/theme-bootstrap-4/',
    to: 'public/plugins/sweetalert2-theme-bootstrap-4'
  },
  // Toastr
  {
    from: 'node_modules/toastr/build/',
    to: 'public/plugins/toastr'
  },
  // jQuery Validate
  {
    from: 'node_modules/jquery-validation/dist/',
    to: 'public/plugins/jquery-validation'
  },
  // bs-custom-file-input
  {
    from: 'node_modules/bs-custom-file-input/dist/',
    to: 'public/plugins/bs-custom-file-input'
  }
]

module.exports = Plugins
