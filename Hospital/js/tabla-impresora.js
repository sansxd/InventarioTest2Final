$(document).ready(function() {
  var dataTable = $('#impresora_data').DataTable( {
    "language":	{
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },

    "paging": true,
    "lengthMenu": [ [10, 25, 50, 100, 500], [10, 25, 50, 100, 500] ],
    "pagingType": "full_numbers",
    "pageLength": 25,
    "select" : true,
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "ajax":{
      url :"php/impresora-data.php", // json datasource
      type: "post",  // method  , by default get
      error: function(){  // error handling
        $(".impresora_data-error").html("");
        $("#impresora_data").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se escuentran datos en el servidor</th></tr></tbody>');
        $("#impresora_data_processing").css("display","none");
      }
    }

  });
  new $.fn.dataTable.Buttons( dataTable, {
    buttons: [

    {
      extend: 'colvis',
      text: 'Ocultar Columnas',
      collectionLayout: 'fixed two-column'
      // columns: ':gt(0)'

    },
    {
      extend: 'excelHtml5',
      title: 'Data Inventario',
      text: 'Exportar a Excel',
      exportOptions: {
        columns: [0, 1,2,3,4,5,6,7]
      }

    },
    {
         extend: 'print',
         text: 'Imprimir Fila',
         exportOptions: {
           columns: [0, 1,2,3,4,5,6,7]
         }
     }
  ]
  } );
  dataTable.buttons().container()
  .appendTo( $('.col-sm-6:eq(0)', dataTable.table().container() ) );
});
