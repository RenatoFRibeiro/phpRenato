
    var xpost = document.getElementById("addoption");
    var xdelete = document.getElementById("deleteoption");
    var xget = document.getElementById("getoption");
    var xedit = document.getElementById("editoption");

  function addoptionFunc() {
    if (xpost.style.display === "block") {
      xpost.style.display = "none";
    } else {
      xpost.style.display = "block";
      xdelete.style.display = "none";
      xget.style.display = "none";
      xedit.style.display = "none";
    }
  }
  function deleteoptionFunc() {
    if (xdelete.style.display === "block") {
      xdelete.style.display = "none";
    } else {
      xdelete.style.display = "block";
      xpost.style.display = "none";
      xget.style.display = "none";
      xedit.style.display = "none";
    }
  }
  function getoptionFunc() {
    if (xget.style.display === "block") {
      xget.style.display = "none";
    } else {
      xget.style.display = "block";
      xpost.style.display = "none";
      xdelete.style.display = "none";
      xedit.style.display = "none";
    }
  }
  function editoptionFunc() {
    if (xedit.style.display === "block") {
      xedit.style.display = "none";
    } else {
      xedit.style.display = "block";
      xpost.style.display = "none";
      xdelete.style.display = "none";
      xget.style.display = "none";
    }
  }