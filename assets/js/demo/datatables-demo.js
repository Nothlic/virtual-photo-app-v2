// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable1').DataTable({
    dom: 'Bfrtip',
    buttons: ['excel', 'pdf', 'print']
  });
});