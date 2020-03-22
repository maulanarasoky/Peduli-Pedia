var req = new XMLHttpRequest();
function ambilDonasi() {
    req.open('POST', 'Ajax/list-donasi-donatur/tampil-data-donasi-berlangsung.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id="title">List Donasi</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <img src='Images/box.png'>
                            <p id='nama-bencana'>Nama Bencana : ${data[key].nama_bencana}</p>
                            <p id='barang'>Barang : ${data[key].nama_barang}</p>
                            <p id='catatan'>Catatan : ${data[key].catatan}</p>
                            <button type='button' name='pilih' onclick='batalDonasi(this.value)' value='${data[key].id_donasi}' id='pilih'>Batal</button>
                        </div>`;
            }
            document.getElementById('list-donasiku').innerHTML = tag;
        }
    }
    req.send();   
}
function batalDonasi(id) {
    req.open('GET', 'Ajax/list-donasi-donatur/batal-donasi.php?id='+id, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            alert('Donasi dibatalkan');
            ambilDonasi();
            document.getElementById('pilih').value;
        }
    }
    req.send();
}
function daftarRiwayat() {
    req.open('POST', 'Ajax/list-donasi-donatur/tampil-data-riwayat-donasi.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id='title'>Riwayat</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <img src='Images/box.png'>
                            <p id='nama-bencana'>Nama Bencana : ${data[key].nama_bencana}</p>
                            <p id='barang'>Barang : ${data[key].nama_barang}</p>
                            <p id='catatan'>Catatan : ${data[key].catatan}</p>
                        </div>`;
            }
            document.getElementById('list-riwayat').innerHTML = tag;
        }
    }
    req.send();   
}