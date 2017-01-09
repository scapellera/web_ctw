$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
      	[ 10, 25, 50, -1 ],
      	[ '10 rows', '25 rows', '50 rows', 'Show all' ]
   		],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );
} );