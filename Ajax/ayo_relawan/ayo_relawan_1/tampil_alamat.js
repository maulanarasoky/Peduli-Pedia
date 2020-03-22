var req = new XMLHttpRequest();
function ambilData() {
    req.open('GET', '../Ajax/ayo_relawan/ayo_relawan_1/tampil_alamat.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = `<tr>
                            <th>Nama Pemilik</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                        </tr>`;
            for(key in data) {
                tag += `<tr>
                            <td>${data[key].nama_pemilik}</td>
                            <td> ${data[key].alamat} </td>
                            <td colspan='2'> ${data[key].nomor_telepon} </td>
                        </tr>`;
            }
            document.getElementById('daftar').innerHTML = tag;
        }
    }
    req.send();   
}