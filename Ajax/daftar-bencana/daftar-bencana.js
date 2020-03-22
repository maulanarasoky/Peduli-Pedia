var req = new XMLHttpRequest;
function ambilData() {
    req.open('GET', 'Ajax/daftar-bencana/data-daftar-bencana.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = ``;
            for(key in data) {
                tag += `<div class='list-artikel'>
                            <img src= 'Data:../Images;base64, ${data[key].gambar_bencana}' >
                            <h3 id='title'> ${data[key].nama_bencana}</h3>
                            <p id='description'> ${data[key].deskripsi_bencana} </p>
                            <p id='date'>${data[key].tanggal_waktu}</p>
                            <form method ='POST'>
                            <button type = 'button' name = 'donasi' value ='${data[key].id_bencana}' id='donasi' onclick="ambilSession(this.value);">Aksi</button>
                            </form>
                        </div>`;
            }
            document.getElementById('daftar-bencana').innerHTML = tag;
        }
    }
    req.send();   
}
function ambilSession(id) {
    req.open('POST', 'Ajax/daftar-bencana/session-daftar-bencana.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            if (req.responseText == "Donasi") {
                document.location.href='Ayo-donasi/ayo-donasi.php';
            }else if(req.responseText == "Relawan") {
                document.location.href='Ayo-relawan/ayo-relawan.php';
            }
        }
    }
    // var id_bencana = document.getElementById('donasi').value;
    let sendData = JSON.stringify({
        'id_bencana' : id
    })
    req.send(sendData);
}   
