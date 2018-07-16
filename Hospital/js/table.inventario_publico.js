$(document).ready(function() {


  // $('#inventario_publico').DataTable( {
  var dataTable = $('#inventario_publico').DataTable( {


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
    // "fixedHeader": true,

    "paging": true,
    "lengthMenu": [ [10, 25, 50, 100, 500], [10, 25, 50, 100, 500] ],
    "pagingType": "full_numbers",
    "pageLength": 25,
    "select" : true,
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "ajax":{
      url :"php/grid-inventario_publico.php", // json datasource
      type: "post",  // method  , by default get
      error: function(){  // error handling
        $(".lookup-error").html("");
        $("#inventario_publico").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se escuentran datos en el servidor</th></tr></tbody>');
        $("#inventario_publico_processing").css("display","none");
      }
    }

  });
  // var data = dataTable.buttons.exportData( {
  //   modifier: {
  //     selected: true
  //   }
  // } );
  new $.fn.dataTable.Buttons( dataTable, {
    buttons: [

    {
      extend: 'colvis',
      text: 'Ocultar Columnas',
      collectionLayout: 'fixed four-column'
      // columns: ':gt(0)'

    },
    {
      extend: 'excelHtml5',
      title: 'Data Inventario',
      text: 'Exportar a Excel',

      // exportOptions: {
      //   columns: ':visible'
      // }
    },
    {
         extend: 'print',
         text: 'Imprimir Fila'
     }
  ]
  } );

  dataTable.buttons().container()
  .appendTo( $('.col-sm-6:eq(0)', dataTable.table().container() ) );


});
