var req = new XMLHttpRequest();
function ambilData() {
    req.open('POST', '../Ajax/konfirmasi-donasi/tampil-data-konfirmasi-donasi.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id="title">List Donasi</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <img src='../Images/box.png'>
                            <p id='nama-bencana'>Nama Bencana : ${data[key].nama_bencana}</p>
                            <p id='barang'>Barang : ${data[key].nama_barang}</p>
                            <p id='catatan'>Catatan : ${data[key].catatan}</p>
                            <button type='button' name='pilih' onclick='pickData(this.value)' value='${data[key].id_donasi}' id='pilih'>Pilih</button>
                        </div>`;
            }
            document.getElementById('pilih-donasi').innerHTML = tag;
        }
    }
    req.send();   
}
function pickData(id) {
    req.open('GET', '../Ajax/konfirmasi-donasi/pilih-konfirmasi-donasi.php?id='+id, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            alert('Sudah dikonfirmasi');
            ambilData();
            document.getElementById('pilih').value;
        }
    }
    req.send();
}