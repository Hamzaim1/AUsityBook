<p>votre chat message est bien envoyer </p>
<script>(function() {
  if ("Notification" in window) {
    var permission = Notification.permission;

    if (permission === "denied" || permission === "granted") {
      return;
    }

    Notification
      .requestPermission()
      .then(function() {
        var notification = new Notification("Hello, world!");
      });
  }
})();
</script>
	<?php context::redirect("monApplication.php?action=profil"); ?>
