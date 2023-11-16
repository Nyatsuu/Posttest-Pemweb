    <!-- HEADER DIMULAI -->
    <?php
    session_start();

    ?>
    <header class="header">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
        
        <nav class="navbar">
            <a href="#home"><strong>home</strong></a>
            <a href="#about"><strong>about</strong></a>
            <a href="#products"><strong>products</strong></a>
            <a href="#menu"><strong>menu</strong></a>
            <a href="./Pages/cart.php"><strong>cart</strong></a>
            <a href="#komen"><strong>komentar</strong></a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <a href="Pages/logout.php"> <div class="fas fa-sign-out-alt"></div></a>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="search-form">
            <form action="Pages/search.php" method="get">
                <input type="search" id="search-box" placeholder="Cari Disini">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            
        </div>

    </header>
    <!-- <div class="cart-items-container">
        <a href="#" class="btn">chechkout sekarang</a>
    </div> -->

    <!-- HEADER SELESAI -->