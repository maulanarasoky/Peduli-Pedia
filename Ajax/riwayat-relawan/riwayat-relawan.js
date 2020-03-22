var req = new XMLHttpRequest();
function sedangBerlangsung() {
    req.open('POST', 'Ajax/riwayat-relawan/tampil-data-sedang-berlangsung-relawan.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1>Sedang Berlangsung</h1>`;
            for(key in data) {
                tag += `<div class='ongoing'>
                            <img src='Data:../Images;base64, ${data[key].gambar_bencana} '>									
                            <p id='nama-bencana'>Nama Bencana :  ${data[key].nama_bencana} </p>
                            <p id='waktu'>Waktu : ${data[key].tanggal_waktu}</p>
                        </div>`;
            }
            document.getElementById('ongoing').innerHTML = tag;
        }
    }
    req.send();   
}
function riwayatRelawan() {
    req.open('POST', 'Ajax/riwayat-relawan/tampil-data-riwayat-relawan.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<h1>Riwayat Relawan</h1>`;
            for(key in data) {
                tag += `<div class='ongoing'>
                            <img src='Data:../Images;base64, ${data[key].gambar_bencana} '>									
                            <p id='nama-bencana'>Nama Bencana :  ${data[key].nama_bencana} </p>
                            <p id='waktu'>Waktu : ${data[key].tanggal_waktu}</p>
                        </div>`;
            }
            document.getElementById('riwayat').innerHTML = tag;
        }
    }
    req.send();   
}