function sortTable(n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("tarefaTable");
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (dir === "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    if(n==2) {
                        document.getElementById('prazoCol').className= "bi bi-chevron-up";
                        document.getElementById('statusCol').className="bi bi-chevron-expand";
                    } else  if(n==3) {
                        document.getElementById('statusCol').className= "bi bi-chevron-down";
                        document.getElementById('prazoCol').className="bi bi-chevron-expand";
                    }
                    break;
                }
            } else if (dir === "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    if(n==2) {
                        document.getElementById('prazoCol').className= "bi bi-chevron-down";
                        document.getElementById('statusCol').className="bi bi-chevron-expand";
                    } else if(n==3) {
                        document.getElementById('statusCol').className= "bi bi-chevron-up";
                        document.getElementById('prazoCol').className="bi bi-chevron-expand";
                    }
                    break;
                }
            }
        }

        if (shouldSwitch) {
            let row1 = rows[i];
            let row2 = rows[i + 1];
            let class1 = row1.className;
            let class2 = row2.className;
            
            row1.parentNode.insertBefore(row2, row1);
            
            row1.className = class2;
            row2.className = class1;

            switching = true;
            switchcount++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
