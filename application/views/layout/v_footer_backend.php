</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
</div>
<!-- /.content -->

<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Proyek 2
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 Kelompok 6</a>.
</footer>
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script>
$(function() {
    // data table
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script>
// pengaturan set flash data
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000)
</script>

</body>

</html>
