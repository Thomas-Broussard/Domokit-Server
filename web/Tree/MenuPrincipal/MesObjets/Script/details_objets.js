function format(data_array) {
	// Format du contenu à afficher lorsqu'on ouvre le row-child
      return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Ajouté le :</td>'+
            '<td>'+data_array.date_ajout+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Dernière connexion  :</td>'+
            '<td>'+data_array.date_connexion+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>NB DATA     :</td>'+
            '<td>'+data_array.date_connexion+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>NB_TRIGGER  :</td>'+
            '<td>'+data_array.date_connexion+'</td>'+
        '</tr>'+
    '</table>'+
    '<br><button type="button" class="btn btn-primary" onclick="location.href=\'#\'" ><i class="fa fa-star"></i>&nbsp; Personnaliser</button>';
  }


  $(document).ready(function () {
      var table = $('#bootstrap-data-table').DataTable({

        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching":   false
      });

      // Add event listener for opening and closing details
      $('#example').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format(tr.data() )).show();
              tr.addClass('shown');
          }
      });
  });
  