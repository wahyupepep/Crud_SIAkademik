// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById("keyword");
var tabel_matkul = document.getElementById("tabel_matkul");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function (event) {
  //  buat object ajax
  var xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tabel_matkul.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "tabelMkl.php?keyword=" + keyword.value, true);
  xhr.send();
});
