<section id="komen">
    <div class="container">
        <h3>Comment</h3>
        <hr>
        <p>Apapun komentar anda tentang produk kami akan sangat membantu kami untuk berkembang.</p>
        <form id="komen-form" action="./Pages/proseskomen.php" method="post">
            <div class="form-group">
                <label for="name">Nama: </label>
                <input type="text" id="name" placeholder="name Anda" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" id="email" placeholder="Email Anda" name="email" required>
            </div>
            <div class="form-group">
                <label for="comment">Komentar: </label>
                <textarea id="comment" name="comment" placeholder="comment" rows="4" required></textarea>
            </div>
            <button type="submit">Kirim</button>
        </form>

        <!-- Tambahkan bagian "Review Komentar" -->
        <div id="review-komentar">
            <h3>Review Komentar</h3>
            <?php
            include 'tampilkomentar.php'; // Include file yang menampilkan komentar
            ?>
        </div>
    </div>
</section>