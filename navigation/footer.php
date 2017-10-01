 <!-- Core Scripts - Include with every page -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>  
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    
     <!-- Page-Level Plugin Scripts Datatables-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#predict').dataTable();
        });
          $(document).ready(function () {
            $('#list').dataTable();
        });
    </script>

</body>

</html>