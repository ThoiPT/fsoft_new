<!-- jQuery -->
<script src="/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/template/plugins/sparklines/sparkline.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>--}}

<!-- overlayScrollbars -->
<script src="/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.js"></script>

<!-- Select2 -->
<script src="/template/plugins/select2/js/select2.full.min.js"></script>

<!-- CkEdit -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<!-- DataTables  & Plugins -->
<script src="/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/template/plugins/jszip/jszip.min.js"></script>
<script src="/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>


<!-- CHECK VALIDATE DESCRIPTION FORM NEW RECRUIT-->
<script>
    ClassicEditor
    var allEditors = document.querySelector('#editor');
    ClassicEditor.create(allEditors);
    $("#frmRequest").submit(function(e) {
        var content = $('#editor').val();
        html = $(content).text();
        if ($.trim(html) == '') {
            alert("Recruit description cannot be blank");
            e.preventDefault();
        }
    });
</script>

<!-- CHECK VALIDATE DESCRIPTION FORM EDIT RECRUIT-->
<script>
    ClassicEditor
    var allEditors = document.querySelector('#editor_frmEdit');
    ClassicEditor.create(allEditors);
    $("#frmRequest_Edit").submit(function(e) {
        var content = $('#editor_frmEdit').val();
        html = $(content).text();
        if ($.trim(html) == '') {
            alert("Recruit description cannot be blank");
            e.preventDefault();
        }
    });
</script>

<!-- CHECK VALIDATE DESCRIPTION FORM EDIT RECRUIT-->
<!-- Data Tables -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    // // BS-Stepper Init
    // document.addEventListener('DOMContentLoaded', function () {
    //     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    // })
    //
    // // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    // var previewNode = document.querySelector("#template")
    // previewNode.id = ""
    // var previewTemplate = previewNode.parentNode.innerHTML
    // previewNode.parentNode.removeChild(previewNode)
</script>

<!-- VALIDATE FORM -->
<!-- jquery-validation -->
<script src="/template/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/template/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="/template/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $('#frmSkill').validate({
            rules: {
                name: {
                    required: true,
                },
                status: {
                    required: true
                }
            },
            messages: {
                name: "Please provide a valid name",
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmRequest').validate({
            rules: {
                title:{
                    required: true,
                },
                exp:{
                    required: true,
                },
                level: {
                    required: true,
                },
                numRecruit: {
                    required: true,
                },
                open_at: {
                    required: true,
                },
                close_at: {
                    required: true,
                },
                status: {
                    required: true,
                },
                skill_id: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmRequest_Edit').validate({
            rules: {
                title:{
                    required: true,
                },
                exp:{
                    required: true,
                },
                level: {
                    required: true,
                },
                numRecruit: {
                    required: true,
                },
                close_at: {
                    required: true,
                },
                status: {
                    required: true,
                },
                skill_id: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmCV').validate({
            rules: {
                name:{
                    required: true,
                },
                phone:{
                    required: true,
                },
                address: {
                    required: true,
                },
                file: {
                    required: true,
                },
                email: {
                  required: true,
                  email: true
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmCV_Edit').validate({
            rules: {
                name:{
                    required: true,
                },
                phone:{
                    required: true,
                },
                address: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmDepartment').validate({
            rules: {
                name:{
                    required: true,
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmAccount').validate({
            rules: {
                name:{
                    required: true,
                },
                email:{
                    required: true,
                    email: true
                },
                password:{
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#frmVacancy').validate({
            rules: {
                name:{
                    required: true,

                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

    });
</script>

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Skll Add Success'
            })
        });
        $('.swalDefaultInfo').click(function() {
            Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Please check the empty fields'
            })
        });
        $('.swalDefaultWarning').click(function() {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultQuestion').click(function() {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    });
</script>
<!-- ChartJS -->



@stack('js')
