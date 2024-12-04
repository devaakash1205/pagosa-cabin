// ------------Home Page Banner Delete
function confirmDeleteBanner(bannerId) {
  if (confirm("Are you sure you want to delete this banner?")) {
    var formData = new FormData();
    formData.append("action", "delete_banner");
    formData.append("banner_id", bannerId);

    fetch("global-function.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Banner deleted successfully!");
          window.location.href = "home-page.php";
        } else {
          alert("An error occurred while deleting the banner.");
        }
      })
      .catch((error) => {
        alert("Error: " + error);
      });
  }
}
// *-------------About Us Banner Delete
function confirmDeleteAboutBanner(bannerId) {
  if (confirm("Are you sure you want to delete this banner?")) {
    var formData = new FormData();
    formData.append("action", "delete_about_banner");
    formData.append("banner_id", bannerId);

    fetch("global-function.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Banner deleted successfully!");
          window.location.href = "about-us-page.php";
        } else {
          alert("An error occurred while deleting the banner.");
        }
      })
      .catch((error) => {
        alert("Error: " + error);
      });
  }
}
