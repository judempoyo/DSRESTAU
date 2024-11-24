<!-- #FOOTER -->

<footer>
  <div class="footer-wrapper">
    <a href="#">
      <img src="../../../assets/images/logo-footer.png" alt="logo" class="footer-brand" width="150">
    </a>
    <div class="social-link">

      <a href="https://twitter.com/Annabel07785340">
        <ion-icon name="logo-twitter"></ion-icon>
      </a>

      <a href="https://www.instagram.com/whxitte">
        <ion-icon name="logo-instagram"></ion-icon>
      </a>

      <a href="https://www.facebook.com/andro.pool.54/">
        <ion-icon name="logo-facebook"></ion-icon>
      </a>

      <a href="https://youtu.be/OTQqj3-Zqi8?si=tT2NfC3Sh7p_UaSS">
        <ion-icon name="logo-youtube"></ion-icon>
      </a>
    </div>
    <p class="copyright">&copy; Copyright 2024 DS. All Rights Reserved.</p>
  </div>
</footer>
</div>

<!--custom js link -->


<script src="../../../assets/vendor/fontawesome/js/all.js"></script>
<script src="../../../assets/js/bootstrap.js"></script>
<script src="../../../assets/js/bootstrap.bundle.js"></script>
<script src="../../../assets/js/taaza.js"></script><!-- 
<script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script> -->

<script src="../../../assets/js/main.js"></script>

<script src="../../../assets/js/jquery-3.7.1.js"></script>

<script src="../../../assets/vendor/DataTables-2.1.3/js/dataTables.dataTables.js"></script>
<script src="../../../assets/vendor/DataTables-2.1.3/js/dataTables.js"></script>
<script src="../../../assets/vendor/buttons/js/dataTables.buttons.js"></script>
<script src="../../../assets/vendor/buttons/js/buttons.dataTables.js"></script>
<script src="../../../assets/vendor/buttons/js/buttons.bootstrap5.js"></script>
<script src="../../../assets/vendor/buttons/js/buttons.html5.js"></script>
<script src="../../../assets/vendor/buttons/js/buttons.print.js"></script>
<script src="../../../assets/vendor/DataTables-tout/datatables.js"></script>

<script>
  document.getElementById("imgselect").onchange = function() {
    var champImg = document.getElementById("champImg");
    var imgselect = document.getElementById("imgselect");
    /* 
      champImg.setAttribute('src',''+imgselect.value);
    */
    var reader = new FileReader();
    reader.onload = function(e) {
      champImg.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(imgselect.files[0]);
    console.dir(imgselect.files[0]);
  }


  document.getElementById("removeimg").onclick = function(e) {
    var champImg = document.getElementById("champImg");
    champImg.setAttribute('src', 'assets/images/upload/default.gif');
  }
</script>

<!-- ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>