var req = new XMLHttpRequest;
function ambilData() {
    req.open('GET', 'Ajax/artikel/daftar_artikel.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = ``;
            for(key in data) {
                tag += `<div class="list-artikel">
                            <img src= 'Data:../Images;base64, ${data[key].gambar_artikel}' >
                            <h3 id="title">${data[key].judul}</h3>
                            <p id="date">Updated | ${data[key].hari}, ${data[key].tanggal_waktu}</p>
                            <button id="readMore" value="${data[key].id_artikel}" onclick="document.location.href='readMore.php?id=${data[key].id_artikel}'">Read More</button>
                        </div>`;
            }
            document.getElementById('daftar-artikel').innerHTML = tag;
        }
    }
    req.send();   
}
function ambilDataArtikel(id) {
    req.open('GET', 'Ajax/artikel/data_artikel.php?id=' + id, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = ``;
            for(key in data) {
                tag += `<div class = "title">
                            <h2 id="title">${data[key].judul}</h2>
                            <p id="date">Updated | ${data[key].hari}, ${data[key].tanggal_waktu}</p>
                        </div>
                        <img src= 'Data:../Images;base64, ${data[key].gambar_artikel}' >
                        <p id="description">${data[key].deskripsi}</p>`;
            }
            document.getElementById('artikel').innerHTML = tag;
        }
    }
    req.send(); 
}