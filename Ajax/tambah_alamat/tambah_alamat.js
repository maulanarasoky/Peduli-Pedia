var req = new XMLHttpRequest();
        
        function inputData() {
            req.open('POST', 'Ajax/tambah_alamat/tambah_alamat.php', true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.location.href='tambah_alamat.php';
                }
            }
                var nama_alamat = document.getElementById('nama_alamat').value;
                var atas_nama = document.getElementById('atas_nama').value;
                var nomor_telepon = document.getElementById('nomor_telepon').value;
                var provinsi = document.getElementById('provinsi').value;
                var kota_kabupaten = document.getElementById('kota_kabupaten').value;
                var kecamatan = document.getElementById('kecamatan').value;
                var kode_pos = document.getElementById('kode_pos').value;
                var alamat_lengkap = document.getElementById('alamat_lengkap').value;

                let sendData = JSON.stringify({
                    'nama_alamat' : nama_alamat,
                    'atas_nama' : atas_nama,
                    'nomor_telepon' : nomor_telepon,
                    'provinsi' : provinsi,
                    'kota_kabupaten' : kota_kabupaten,
                    'kecamatan' : kecamatan,
                    'kode_pos' : kode_pos,
                    'alamat_lengkap' : alamat_lengkap
                })

                req.send(sendData);
        }
        function ambilData() {
            req.open('GET', 'Ajax/tambah_alamat/tampil_alamat.php', true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    let data = JSON.parse(req.responseText);
                    var tag = `<tr id='alamat'>
                                    <th>Aksi</th>
                                    <th>Nama Alamat</th>
                                    <th colspan='2'>Alamat</th>
                                </tr>`;
                    for(key in data) {
                        tag += `<tr id='alamat'>
                                    <td><button type='button' onclick='hapusData(this.value)' value='${data[key].id_alamat}' id='hapus'>Hapus</button></td>
                                    <td> ${data[key].nama_alamat} </td>
                                    <td colspan='2'> ${data[key].alamat} </td>
                                </tr>`;
                    }
                    document.getElementById('daftar-alamat').innerHTML = tag;
                }
            }
            req.send();   
        }
        function hapusData(id) {

            //kode disini
            req.open('GET', 'Ajax/tambah_alamat/hapus_alamat.php?id='+id, true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    ambilData();
                    document.getElementById('hapus').value;
                }
            }
            req.send();
        }