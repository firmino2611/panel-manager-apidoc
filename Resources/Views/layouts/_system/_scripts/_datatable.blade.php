<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/apidoc/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/apidoc/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/apidoc/dist/js/demo.js')}}"></script>
<script>
    $(function () {

        $('#example2').DataTable({
            "columnDefs": [
                {"orderable": true}
            ],
            "language": {
                "zeroRecords": "Nenhuma informação encontrada",
                "infoEmpty": "Mostrando 0 resultados encontrados",
                "infoFiltered":   "(filtro aplicado nas _MAX_ entradas)",
                "info":  "Mostrando _START_ a _END_ do total de _TOTAL_ encontradas",
                "search": "Pesquisa:",
                "lengthMenu":     "Mostrar _MENU_ resultados",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Próximo",
                    "previous":   "Anterior"
                },
            }
        });
    });
</script>
