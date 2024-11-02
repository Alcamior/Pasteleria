@extends('layaout.stencil')
@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('title','Realizar pedido')

@section('main')

<h2>Datos del pedido</h2>
<label>Producto</label><br>
<select name="producto" id="producto" class="form-control select2">
    <option value="">Selecciona un producto</option>
    @foreach ($productos as $producto)
        <option value="{{ $producto->idpro }}" data-nombre="{{ $producto->nombre }}" data-precio="{{ $producto->precio }}">{{ $producto->nombre }}</option>
    @endforeach
</select><br>

<label>Descripción</label><br>
<input type="text" id="descripcion" class="form-control"><br>

<label>Cantidad</label><br>
<input type="number" id="cantidad" class="form-control"><br>

<label>Promoción</label><br>
<select name="promocion " id="promocion" class="form-control select2">
    <option value="">Selecciona una promoción</option>
    @foreach ($promociones as $promocion)
        <option value="{{ $promocion->idprom }}" data-codigo="{{ $promocion->codigo }}" data-descuento="{{ $promocion->descuento }}">{{ $promocion->descripcion }}</option>
    @endforeach
</select><br><br>

<button id="agregarProducto" class="btn btn-primary">Agregar Producto</button><br><br>

<h2>Productos Agregados</h2>
<div class="table">
    <table id="myTable" class="table" >
        <thead>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Descuento</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="listaProductos">
            <!--Productos seleccionados -->
        </tbody>
    </table>
</div>


<br>
<p>Subtotal: <span id="subtotal">0</span></p>
<p>Total: <span id="total">0</span></p>


<form action="{{route('pedido.store')}}" method="post">
@csrf
    <button>Enviar</button>
</form>

@endsection


<script>
document.addEventListener("DOMContentLoaded", function() {
    $('.select2').select2({
        placeholder: "Selecciona una opción",
        allowClear: true
    });

    document.getElementById('agregarProducto').addEventListener('click', function() {
        const select = document.getElementById('producto');
        const idProducto = select.value;
        const nombreProducto = select.options[select.selectedIndex].dataset.nombre;
        const precio = parseFloat(select.options[select.selectedIndex].dataset.precio); // Obtener el precio
        const descripcion = document.getElementById('descripcion').value;
        const cantidad = parseInt(document.getElementById('cantidad').value) || 0; // Asegurarse de que sea un número

        const promocionSelect = document.getElementById("promocion");
        const promocionText = promocionSelect.options[promocionSelect.selectedIndex].text;
        const descuento = parseFloat(promocionSelect.options[promocionSelect.selectedIndex].dataset.descuento) || 0;

        if (idProducto && cantidad > 0) {
            // Calcular subtotal
            const subtotalProducto = precio * cantidad;

            // Crear una nueva fila en la tabla
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${nombreProducto}</td>
                <td>${descripcion}</td>
                <td>${cantidad}</td>
                <td>${descuento*100}</td>
                <td>${precio.toFixed(2)}</td> <!-- Mostrar precio unitario -->
                <td>${subtotalProducto.toFixed(2)-descuento*precio}</td> <!-- Mostrar subtotal -->
                <td>
                    <button type="button" class="btn btn-danger eliminar" data-id="${idProducto}" data-subtotal="${subtotalProducto}">Eliminar</button>
                </td>
            `;

            document.getElementById('listaProductos').appendChild(tr);

            // Limpiar el campo de selección y los inputs
            select.value = '';
            document.getElementById('descripcion').value = '';
            document.getElementById('cantidad').value = '';
            document.getElementById('promocion').value = '';
            $(select).val('').trigger('change');

            // Actualizar subtotal y total
            updateTotals();
        }
    });

    // Manejar el evento de eliminar un producto de la lista
    document.getElementById('listaProductos').addEventListener('click', function(event) {
        if (event.target.classList.contains('eliminar')) {
            const subtotal = parseFloat(event.target.dataset.subtotal);
            event.target.closest('tr').remove(); // Eliminar la fila

            // Actualizar subtotal y total
            updateTotals(subtotal);
        }
    });

    // Función para actualizar el subtotal y total
    function updateTotals(removedSubtotal = 0) {
        const rows = document.querySelectorAll('#listaProductos tr');
        let subtotal = 0;

        rows.forEach(row => {
            const subtotalCell = parseFloat(row.cells[5].innerText) || 0; // Obtener el subtotal de la fila
            subtotal += subtotalCell;
        });

        subtotal -= removedSubtotal;
        subtotal = Math.max(0, subtotal);

        document.getElementById('subtotal').innerText = subtotal.toFixed(2);
        document.getElementById('total').innerText = subtotal.toFixed(2);
    }


    document.getElementById('formVenta').addEventListener('submit', function() {
        // Productos guardados en un campo oculto
        const lista = document.getElementById('listaProductos');
        const productos = Array.from(lista.children).map(tr => ({
            id: tr.querySelector('.eliminar').dataset.id,
            nombre: tr.children[0].innerText,
            descripcion: tr.children[1].innerText,
            cantidad: tr.children[2].innerText,
            promocion: tr.children[3].innerText,
            precio: tr.children[4].innerText,
            subtotal: tr.children[5].innerText 
        }));

        // Convertir el objeto a JSON y almacenar en el campo oculto
        document.getElementById('productos').value = JSON.stringify(productos);
    });
});
</script>

