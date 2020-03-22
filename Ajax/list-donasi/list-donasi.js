var req = new XMLHttpRequest();
function ambilData() {
    req.open('POST', 'Ajax/list-donasi/tampil-data-semua-donasi.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id='title'>List Donasi</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <img src='Images/box.png'>
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
    req.open('GET', 'Ajax/list-donasi/daftar-pickup-donasi.php?id='+id, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            alert('berhasil pickup');
            ambilData();
            document.getElementById('pilih').value;
        }
    }
    req.send();
}
function ambilPickUp() {
    req.open('POST', 'Ajax/list-donasi/tampil_pickup_donasi.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id='title'>List Pick Up</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <div class='atas'>
                                <img src='Images/box.png'>
                                <div class='keterangan'>
                                    <p>Nama Bencana : ${data[key].nama_bencana}</p>
                                    <p>Tempat Bencana : ${data[key].lokasi_bencana}</p>
                                    <p>Nama Donatur : ${data[key].nama_donatur}</p>
                                </div>
                            </div>
                            <div class='bawah'>
                                <form method='POST'>
                                    <input type='file' name='bukti' id='bukti'>
                                    <p id='status'>Status</p>
                                    <select name='status' id='status-track'>
                                        <option value='Pending'>Pending</option>
                                        <option value='Sedang Dikirim'>Sedang Dikirim</option>
                                        <option value='Sudah Sampai'>Sudah Sampai</option>
                                    </select>
                                    <br/>
                                    <textarea name='keterangan' id="keterangan"></textarea>
                            </div>
                                    <button type='button' name='kirim' value='${data[key].id_donasi}' id='kirim' onclick='kirim(this.value);'>Kirim</button>
                                </form>
                        </div>`;
            }
            document.getElementById('daftar-pickup').innerHTML = tag;
        }
    }
    req.send();   
}
function kirim(id) {
    req.open('POST', 'Ajax/list-donasi/kirim-konfirmasi.php?id='+id, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            ambilPickUp();
            alert('Data berhasil diupdate');
            document.getElementById('kirim').value;
        }
    }
    var bukti = document.getElementById('bukti').value;
    var status = document.getElementById('status-track').value;
    var keterangan = document.getElementById('keterangan').value;

    let sendData = JSON.stringify({
        'bukti' : bukti,
        'status' : status,
        'keterangan' : keterangan
    })
    req.send(sendData);
}
function riwayatPickUp() {
    req.open('POST', 'Ajax/list-donasi/riwayat-pickup-donasi.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id='title'>Riwayat Pick Up</h1>`;
            for(key in data) {
                tag += `<div class='donasi'>
                            <img src='Images/box.png'>
                            <p id='nama-bencana'>Nama Bencana : ${data[key].nama_bencana}</p>
                            <p id='catatan'>Lokasi Bencana : ${data[key].lokasi_bencana}</p>
                            <p id='barang'>Barang : ${data[key].nama_barang}</p>
                            <p id='konfirmasi'>${data[key].konfirmasi}</p>
                        </div>`;
            }
            document.getElementById('riwayat-pickup').innerHTML = tag;
        }
    }
    req.send();   
}
// let getDataRealTime = setInterval(ambilData, 1000);