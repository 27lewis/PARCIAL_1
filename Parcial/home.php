<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagen/logo.ico">
    <title>Restaurante Muchoriko</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Restaurante Muchoriko</h1>
            <h3>Ordena ya</h3>
            <form method="post" action="">
                <fieldset>
                    <legend>Rellenar aquí!</legend>

                    <label><b>Nombre</b></label>
                    <input type="text" name="Nombre"><br>

                    <label><b>Dirección</b></label>
                    <input type="text" name="Dirección"><br>

                    <label><b>Teléfono</b></label>
                    <input type="number" name="Telefono"><br>

                    <label><b>Medio pollo asado $20.000</b></label>
                    <input type="number" name="medio" min="0" value="0"><br>
                    <label><b>Acompañarlo</b></label>
                    <select name="Tbebidas1">
                        <option value=""></option>
                        <option value="Yuca">Yuca</option>
                        <option value="Papas Fritas">Papas Fritas</option>
                        <option value="Ensalada">Ensalada</option>
                    </select><br>

                    <label><b>Pollo asado al carbón $35.000</b></label>
                    <input type="number" name="carbon" min="0" value="0"><br>
                    <label><b>Acompañarlo</b></label>
                    <select name="Tbebidas2">
                        <option value=""></option>
                        <option value="Yuca">Yuca</option>
                        <option value="Papas Fritas">Papas Fritas</option>
                        <option value="Ensalada">Ensalada</option>
                    </select><br>

                    <label><b>Filete de pollo a la plancha $40.000</b></label>
                    <input type="number" name="filete" min="0" value="0"><br>
                    <label><b>Acompañarlo</b></label>
                    <select name="Tbebidas3">
                        <option value=""></option>
                        <option value="Sin acompañamiento">Sin acompañamiento</option>
                        <option value="Papas Fritas y Ensalada">Papas Fritas y Ensalada</option>
                    </select><br>

                    <label><b>Arroz de pollo $20.000</b></label>
                    <input type="number" name="arroz" min="0" value="0"><br>

                    <!-- Bebidas -->
                    <label><b>Bebidas</b></label>
                    <input type="number" name="Bebidas1" min="0" value="0">
                    <label><b>Sabor</b></label>
                    <select name="Tbebidas1_extra">
                        <option value=""></option>
                        <option value="Cocacola">Cocacola $5.000</option>
                        <option value="Sprite">Sprite $5.000</option>
                        <option value="Manzana">Manzana $5.000</option>
                        <option value="Botella de Agua">Botella de Agua $3.000</option>
                    </select><br>

                    <label><b>Bebidas</b></label>
                    <input type="number" name="Bebidas2" min="0" value="0">
                    <label><b>Sabor</b></label>
                    <select name="Tbebidas2_extra">
                        <option value=""></option>
                        <option value="Cocacola">Cocacola $5.000</option>
                        <option value="Sprite">Sprite $5.000</option>
                        <option value="Manzana">Manzana $5.000</option>
                        <option value="Botella de Agua">Botella de Agua $3.000</option>
                    </select><br>

                    <label><b>Bebidas</b></label>
                    <input type="number" name="Bebidas3" min="0" value="0">
                    <label><b>Sabor</b></label>
                    <select name="Tbebidas3_extra">
                        <option value=""></option>
                        <option value="Cocacola">Cocacola $5.000</option>
                        <option value="Sprite">Sprite $5.000</option>
                        <option value="Manzana">Manzana $5.000</option>
                        <option value="Botella de Agua">Botella de Agua $3.000</option>
                    </select><br>

                    <label><b>Bebidas</b></label>
                    <input type="number" name="Bebidas4" min="0" value="0">
                    <label><b>Sabor</b></label>
                    <select name="Tbebidas4_extra">
                        <option value=""></option>
                        <option value="Cocacola">Cocacola $5.000</option>
                        <option value="Sprite">Sprite $5.000</option>
                        <option value="Manzana">Manzana $5.000</option>
                        <option value="Botella de Agua">Botella de Agua $3.000</option>
                    </select><br><br>

                    <input type="submit" name="enviar" value="Ordenar">
                </fieldset>
            </form>
        </header>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Nombre = $_POST['Nombre'];
            $Direccion = $_POST['Dirección'];
            $Telefono = $_POST['Telefono'];
            $medio = (int)$_POST['medio'];
            $carbon = (int)$_POST['carbon'];
            $filete = (int)$_POST['filete'];
            $arroz = (int)$_POST['arroz'];
            $Tbebidas1 = $_POST['Tbebidas1'];
            $Tbebidas2 = $_POST['Tbebidas2'];
            $Tbebidas3 = $_POST['Tbebidas3'];

            $total = 0;
            $total += $medio * 20000;
            $total += $carbon * 35000;
            $total += $filete * 40000;
            $total += $arroz * 20000;

            $precios_bebidas = [
                "Cocacola" => 5000,
                "Sprite" => 5000,
                "Manzana" => 5000,
                "Botella de Agua" => 3000
            ];

            for ($i = 1; $i <= 4; $i++) {
                $cant = (int)$_POST["Bebidas$i"];
                $sabor = $_POST["Tbebidas{$i}_extra"];
                if (array_key_exists($sabor, $precios_bebidas)) {
                    $total += $precios_bebidas[$sabor] * $cant;
                }
            }

            echo "
            <div>
                <p><strong>Nombres:</strong> $Nombre</p>
                <p><strong>Dirección:</strong> $Direccion</p>
                <p><strong>Teléfono:</strong> $Telefono</p>
                <p><strong>Medio pollo asado:</strong> $medio</p>
                <p><strong>Acompañado:</strong> $Tbebidas1</p>
                <p><strong>Pollo asado al carbón:</strong> $carbon</p>
                <p><strong>Acompañado:</strong> $Tbebidas2</p>
                <p><strong>Filete de pollo a la plancha:</strong> $filete</p>
                <p><strong>Acompañado:</strong> $Tbebidas3</p>
                <p><strong>Arroz de pollo:</strong> $arroz</p>
                <p><strong>Costo total:</strong> <span style='color: green;'>$ $total</span></p>
            </div>";
        }
        ?>
    </div>
</body>
</html>
