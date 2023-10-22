function search() {
    var input, filter, pd, div, h1, i, txtValue;
    input = document.getElementById("srch");
    filter = input.value.toUpperCase();
    pd = document.getElementById("parentDiv");
    div = pd.getElementsByTagName("div");
    for (i = 0; i < div.length; i++) {
        h1 = div[i].getElementsByTagName("h1")[0];
        txtValue = h1.textContent || h1.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            div[i].style.display = "";
        } else {
            div[i].style.display = "none";
        }
    }
}