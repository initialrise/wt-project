const suggestions = document.getElementById("suggestions");

function searchMovie(moviename) {
  if (moviename.length > 0) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        suggestions.innerHTML = xhr.response;
      }
    };
    var url = `search.php?search=${moviename}`;
    xhr.open("GET", url);
    xhr.send();
  } else {
    suggestions.innerHTML = "";
  }
}
