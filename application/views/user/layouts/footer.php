    </div> <!-- dashboard -->
</div> <!-- main-content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script>
document.querySelectorAll("table.datatable").forEach(table => {
    if (!table.classList.contains("datatable-initialized")) {
        new simpleDatatables.DataTable(table);
        table.classList.add("datatable-initialized");
    }
});
</script>
</body>
</html>
