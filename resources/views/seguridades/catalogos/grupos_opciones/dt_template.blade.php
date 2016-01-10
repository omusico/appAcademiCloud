<table id="dt" class="table table-hover demo-table-search ">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
            <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr >
        @foreach($columns as $i => $c)
            <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr>
            @foreach($d as $dd)
                <td>{{ $dd }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript">


    jQuery(document).ready(function(){

        var table = $("#dt");

        table.dataTable({
            "sAjaxSource": "{{ $options['sAjaxSource'] }}",
            "bServerSide": true,
            "sDom": "<'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sProcessing":   "Procesando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "No se encontraron resultados",
                "sInfo":         "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando desde 0 hasta 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sPrevious": "Anterior",
                    "sNext":     "Siguiente",
                    "sLast":     "Último"
                }
            },
            "bAutoWidth": false,
            "aoColumns": [{ "sWidth": "40px" }, { "sWidth": "150px" }, { "sWidth": "auto" }, { "sWidth": "90px" }],
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,1,2,3 ] }
            ],
            "iDisplayLength": 15
        });

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });
    });



</script>

@if (!$noScript)
    @include('datatable::javascript', array('id' => $id, 'options' => $options, 'callbacks' =>  $callbacks))
@endif

