<!-- MENU -->

<section class="menu" id="menu">
    <h1 class="heading"><span>menu</span></h1>
    <div class="box-container">
        
            <?php
            // Database connection parameters
            include 'koneksi.php';

            // Fetch menu items from the database
            $select_query = "SELECT id, nameproducts, price, foto FROM menu";
            $result = $conn->query($select_query);

            // if ($result) {
            if ($result->num_rows > 0) {
                // Output data of each row
                echo '<div class="box">';
                while ($row = $result->fetch_assoc()) {
                    echo '<form action="./Pages/action_cart.php" method="POST">';
                        echo '<img src="'.$row["foto"].'" alt="">';
                        echo '<h3 name="nama" id="nama" value="' . $row["nameproducts"].'">' . $row["nameproducts"] . '</h3>';
                        echo '<div id="harga" name="harga" class="price" value="' . $row["price"].'">Rp ' . $row["price"] . '</div>';
                        echo '<input style="display: none;" type="" name="namainput" id="hiddennama" value="' . $row["nameproducts"].'">></input>';
                        echo '<input style="display: none;" type="" name="hargainput" id="hiddenprice" value="' . $row["price"].'"></input>';
                        
                        echo '<input name="button" type="submit" value="Masukkan Keranjang" class="btn add-to-cart" data-id="' . $row["id"] . '" data-name="' . $row["nameproducts"] . '" data-price="' . $row["price"] . '">></input>';
                    }
                } else {
                    echo '<p class="error">Menu is currently empty.</p>';
                }
                echo '</form>';
            // } else {
            //     echo '<p class="error">Error fetching menu: ' . $conn->error . '</p>';
            // }

            // Close the database connection
            $conn->close();
            ?>
            <script>
                var value = document.getElementById("nama").innerHTML;
                var hiddennama = document.getElementById("hiddennama");
                hiddennama.value = value;

                var price = document.getElementById("harga").innerHTML;
                var hiddenprice = document.getElementById("hiddenprice");
                hiddenprice.value = price;


            </script>
        
    </div>
</section>

<!-- MENU SELESAI -->

