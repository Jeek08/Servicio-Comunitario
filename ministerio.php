<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ministerio</title>
    <link rel="stylesheet" type="text/css" href="tablas.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Inventario del Ministerio</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar Medicamento...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Exportar como &nbsp; &#10140;</label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>

            <div class="modal">   
            <button type="button" class="button" id="btn-abrir-modal">
    <span class="button__text">Agregar</span>
    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button>

    <form class="form" action="agregarminis.php" name="ejemplo" method="post">
        <dialog opern class="modal" id="modal">
        <p class="title">Agregar </p>
        <p class="message">Completa los campos para agregar el medicamento </p>
            <div>
            <label>
                <input name="lote" required="" placeholder="" type="text" class="input">
                <span>Lote</span>
            </label>
    
            <label>
                <input name="medicamento" required="" placeholder="" type="text" class="input">
                <span>Medicamento</span>
            </label>
        </div>  
                
        <label>
            <input name="ml_mg" required="" placeholder="" type="text" class="input">
            <span>Ml/Mg</span>
        </label> 
            
        <label>
            <input name="vencimiento" required="" placeholder="dd/mm/aaaa" type="date" class="input">
            <span style="margin-top: 3px;">Vencimiento</span>
        </label>

        <label>
            <input name="cantidad" required="" placeholder="" type="number" class="input">
            <span>Cantidad</span>
        </label>
        
        <button type="submit" class="submit">Agregar</button>
        <p class="signin">No querias agregar un medicamento? <a href="#" class="cerrar" id="btn-cerrar-modal">Cerrar</a> </p>
        </dialog>
        <script>

            const btnAbrirModal = document.querySelector("#btn-abrir-modal");
            const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
            const modal = document.querySelector("#modal");
          
            btnAbrirModal.addEventListener("click",()=>{modal.showModal();})
          
            btnCerrarModal.addEventListener("click",()=>{modal.close()})
          
            const btnEnviarModal = document.getElementById('btn-enviar-modal');
            const tablaProductos = document.getElementById('tabla-productos');
            const inputs = document.querySelectorAll('#modal input');
          
            btnEnviarModal.addEventListener('click', () => {
              const valoresInputs = Array.from(inputs).map(input => input.value);
          
              if (valoresInputs.every(valor => valor.trim() !== '')) {
                const fila = document.createElement('tr');
          
                valoresInputs.forEach(valor => {
                  const celda = document.createElement('td');
                  celda.textContent = valor;
                  fila.appendChild(celda);
                });
          
                tablaProductos.querySelector('tbody').appendChild(fila);
          
                
                inputs.forEach(input => (input.value = ''));
          
                
                const modal = document.getElementById('modal');
                modal.close();
              }
            });
          
          
              </script>           
    </form>
        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Lote </th>
                        <th> Medicamento </th>
                        <th> Ml / Mg </th>
                        <th> Vencimiento </th>
                        <th> Cantidad </th>
                        <th> Accion </th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Cambia a tu usuario de MySQL
$password = "admin"; // Cambia a tu contraseña de MySQL
$dbname = "inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT lote, medicamento, ml_mg, vencimiento, cantidad FROM ministerio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["lote"] . "</td>";
        echo "<td>" . $row["medicamento"] . "</td>";
        echo "<td>" . $row["ml_mg"] . "</td>";
        echo "<td>" . date("d M, Y", strtotime($row["vencimiento"])) . "</td>";
        echo "<td><strong>" . $row["cantidad"] . "</strong></td>";
        echo "<td><a href='eliminarminis.php?lote=" . urlencode($row["lote"]) . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'>Eliminar</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
}

$conn->close();
?>

                </tbody>
            </table>
        </section>
    </main>


    <script>

        document.getElementById('toEXCEL').addEventListener('click', () => {
            exportToExcel();
        });

        function exportToExcel() {
            const table = document.querySelector('table');
            const rows = table.querySelectorAll('tr');

            const data = [];
            rows.forEach((row, rowIndex) => {
                const cols = row.querySelectorAll('td, th');
                const rowData = [];
                cols.forEach((col, colIndex) => {
                    // Omitir la última columna (Acciones)
                    if (colIndex < cols.length - 1) {
                        rowData.push(col.innerText);
                    }
                });
                data.push(rowData);
            });

            const ws = XLSX.utils.aoa_to_sheet(data);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            XLSX.writeFile(wb, 'Ministerio.xlsx');
        }
    </script>
   <script src="tabla.js"></script> 
</body>
</html>
