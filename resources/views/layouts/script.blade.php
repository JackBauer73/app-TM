<!-- Script addRow et removeRow Creation Tableau -->
<script>
    function addRow() {
        var table = document.getElementById("table");
        var row = table.insertRow();
        var nomCell1 = row.insertCell();
        nomCell1.innerHTML = '<input type="text" class="form-control" name="nom_tableau[]" required>';
        var nomCell2 = row.insertCell();
        nomCell2.innerHTML = '<input type="date" class="form-control" name="date[]" required>';
        var nomCell3 = row.insertCell();
        nomCell3.innerHTML = '<input type="number" class="form-control" name="heure[]" required>';
        var nomCell4 = row.insertCell();
        nomCell4.innerHTML = '<input type="number" class="form-control" name="prix_tournoi[]" required>';
        var nomCell5 = row.insertCell();
        nomCell5.innerHTML = '<input type="number" class="form-control" name="max_joueurs[]" required>';
        var nomCell6 = row.insertCell();
        nomCell6.innerHTML = '<Select type="text" class="form-control" name="type_tableau[]" required >' +
            '<option value="0">Simple</option>' +
            '<option value="1">Double</option>' +
            '</select>';
        var nomCell7 = row.insertCell();
        nomCell7.innerHTML = '<input type="number" class="form-control" name="points_mini[]" required>';
        var nomCell8 = row.insertCell();
        nomCell8.innerHTML = '<input type="number" class="form-control" name="points_max[]" required>';
        var nomCell9 = row.insertCell();
        nomCell9.innerHTML = '<div class="input-group">' +
            '<input type="text" name="colors[]" class="form-control input-lg" value="#902100" />' +
            '<span class="input-group-append">' +
            '<span class="input-group-text colorpicker-input-addon"><i></i></span>' +
            '</span>' +
            '</div>';
        // Initialiser le color picker pour le nouveau champ de couleur
        var newColorPickerInput = nomCell9.querySelector('.color-picker-input');
        $(newColorPickerInput).colorpicker({
            debug: true
        }).on('colorpickerDebug', function(e) {
            // Gérer les événements de débogage si nécessaire
            // ...
        });
        var actionsCell = row.insertCell();
        actionsCell.innerHTML =
            '<button type="button" class="btn btn-danger" onclick="removeRow(this)">-</button>';


    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/js/bootstrap5-toggle.ecmas.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js') }}/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>



<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))

    });

    $(function() {
        // $('#cp1').colorpicker({
        //     inline: true,
        //     container: true,
        //     extensions: [{
        //         name: 'swatches', // extension name to load
        //         options: { // extension options
        //             colors: {
        //                 'black': '#000000',
        //                 'gray': '#888888',
        //                 'white': '#ffffff',
        //                 'red': 'red',
        //                 'default': '#777777',
        //                 'primary': '#337ab7',
        //                 'success': '#5cb85c',
        //                 'info': '#5bc0de',
        //                 'warning': '#f0ad4e',
        //                 'danger': '#d9534f'
        //             },
        //             namesAsValues: true
        //         }
        //     }]
        // });
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker3').colorpicker()

    });
    $(function() {
        var n = 0;
        $('input[name = "colors[]"]')
            .colorpicker({
                debug: true
            })
            .on('colorpickerDebug', function(e) {
                var dbg = $('#cp2_debug');
                n++;
                while (dbg.find('li').length > 10) {
                    // only list last 10 events
                    dbg.find('li').first().remove();
                }
                dbg.append('<li>' + n + ': ' + e.debug.eventName + '</li>');
            });
    });

    function initializeColorPicker(element) {
        $(element)
            .colorpicker({
                debug: true
            })
            .on('colorpickerDebug', function(e) {
                var dbg = $('#cp2_debug');
                n++;
                while (dbg.find('li').length > 10) {
                    // only list last 10 events
                    dbg.find('li').first().remove();
                }
                dbg.append('<li>' + n + ': ' + e.debug.eventName + '</li>');
            });
    }
</script>
