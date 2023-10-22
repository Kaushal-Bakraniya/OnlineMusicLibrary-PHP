function search() {
    var input, filter, tbl, tr, td, i, txtValue;
    input = document.getElementById("srch");
    filter = input.value.toUpperCase();
    tbl = document.getElementById("myTbl");
    tr = tbl.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}