<br>

<!-- Footer -->
<footer class="as-container as-theme-d3 as-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="as-container as-theme-d5">
  <p>Copyright &copy; <?php echo as_siteTitle.' '.date('Y') ?></p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("as-show") == -1) {
        x.className += " as-show";
        x.previousElementSibling.className += " as-theme-d1";
    } else { 
        x.className = x.className.replace("as-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" as-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("as-show") == -1) {
        x.className += " as-show";
    } else { 
        x.className = x.className.replace(" as-show", "");
    }
}
</script>

</body>
</html> 