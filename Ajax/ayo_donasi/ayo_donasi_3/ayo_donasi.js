var req = new XMLHttpRequest();

function donasiBarang() {
    req.open('POST', '../Ajax/ayo_donasi/ayo_donasi_3/donasi_barang.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.location.href='ayo-donasi4.php';
        }
    }
    var namaBarang = document.getElementById('namaBarang').innerHTML;
    var jumlah = document.getElementById('jumlah').innerHTML;
    var catatan = document.getElementById('catatan').innerHTML;

    let sendData = JSON.stringify({
        'namaBarang' : namaBarang,
        'jumlah' : jumlah,
        'catatan' : catatan
    })
    req.send(sendData);
}
function donasiUang() {
    req.open('POST', '../Ajax/ayo_donasi/ayo_donasi_3/donasi_uang.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.location.href='ayo-donasi4.php';
        }
    }
    var nominal = document.getElementById('nominal').innerHTML;
    var bank = document.getElementById('bank').innerHTML;
    var catatan = document.getElementById('catatan').innerHTML;

    let sendData = JSON.stringify({
        'nominal' : nominal,
        'bank' : bank,
        'catatan' : catatan
    })
    req.send(sendData);
}