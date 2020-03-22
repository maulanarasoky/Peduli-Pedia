var req = new XMLHttpRequest();
function ambilData() {
    req.open('POST', '../Ajax/konfirmasi-relawan/tampil-data-konfirmasi-relawan.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1 id='title'>List Relawan</h1>`;
            for(key in data) {
                tag += `<div class='ongoing'>
                            <img src='Data:../Images;base64, ${data[key].gambar_bencana} '>									
                            <p id='nama-bencana'>Nama Bencana :  ${data[key].nama_bencana} </p>
                            <p id='waktu'>Waktu : ${data[key].tanggal_waktu}</p>
                            <p id='peserta'>Relawan : ${data[key].nama_relawan}</p>
                            <button type='button' name='pilih' onclick='pickData(this.value)' value='${data[key].id_ayo_relawan}' id='pilih'>Pilih</button>
                        </div>`;
            }
            document.getElementById('pilih-donasi').innerHTML = tag;
        }
    }
    req.send();   
}
function pickData(id) {
    req.open('GET', '../Ajax/konfirmasi-relawan/pilih-konfirmasi-relawan.php?id='+id, true);
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