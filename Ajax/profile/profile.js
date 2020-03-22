var req = new XMLHttpRequest();
function ambilData() {
    req.open('GET', 'Ajax/profile/tampil_data_profile.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            let data = JSON.parse(req.responseText);
            var tag = ``;
            for(key in data) {
                tag = `<div class='profilee'>
                        <div class='photo'>
                            <img src='Images/user.png'>
                            <p id='name'> ${data[key].nama} </p>
                            <p id='poin'> ${data[key].poin} </p>
                            
                        </div>
                        <div class='description'>
                            <p>Nama Depan 	 : ${data[key].namaDepan} </p>
                            <p>Nama Belakang : ${data[key].namaBelakang} </p>
                            <p>E-mail		 : ${data[key].email} </p>
                            <p>Nomor KTP	 : ${data[key].nik} </p>
                            <button type=button id=change onclick="tampilDataUpdateForm();">Ubah</button></div>`;
            }
            document.getElementById('profile').innerHTML = tag;
        }
    }
    req.send();   
}
function updateData() {

    req.open('POST', 'Ajax/profile/update_data_profile.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            alert(req.responseText);
            if(req.responseText == "Update Berhasil") {
                document.location.href = 'profile.php';
            }
        }
    }
        var namaDepan = document.getElementById('namaDepan').value;
        var namaBelakang = document.getElementById('namaBelakang').value;
        var email = document.getElementById('email').value;
        var nik = document.getElementById('nik').value;
        var tanggal = document.getElementById('tanggal').value;
        var jk = document.getElementById('jk').value;

        let sendData = JSON.stringify({
            'namaDepan' : namaDepan,
            'namaBelakang' : namaBelakang,
            'email' : email,
            'nik' : nik,
            'tanggal' : tanggal,
            'jk' : jk
        })
    req.send(sendData);
}
function tampilDataUpdateForm() {
    req.open('GET', 'Ajax/profile/update_form.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('form-tambah').style.display = 'block';
            document.getElementById('form-tambah').style.zIndex = '1';
            document.getElementById('whole-cover').style.display = 'block';
            document.getElementById('body').style.overflow = 'hidden';
            $(document).ready(function(){
                $(".whole-cover").click(function(){
                    document.getElementById('form-tambah').style.display = 'none';
                    document.getElementById('form-tambah').style.zIndex = '-1';
                    document.getElementById('whole-cover').style.display = 'none';
                    document.getElementById('body').style.overflow = 'visible';
                    // document.location.href='profile.php';
                });
            });
            let data = JSON.parse(req.responseText);
            var tag = ``;
            for(key in data) {
                tag = `<form method='POST'>
                <table>
                    <tr>
                        <td>Nama Depan</td>
                        <td>: <input type='text' name='namaDepan' value='${data[key].namaDepan}' id='namaDepan'></td>
                    </tr>
                    <tr>
                        <td>Nama Belakang</td>
                        <td>: <input type='text' name='namaBelakang' value='${data[key].namaBelakang}' id='namaBelakang'></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <input type='email' name='email' value='${data[key].email}' id='email'></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: <input type='number' name='nik' value='${data[key].nik}' id='nik'></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <input type='date' name='tanggal' value='${data[key].tanggal_lahir}' id='tanggal'></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <input type='radio' name='jk' value='Laki - Laki' id='jk' checked>Laki-Laki
                              <input type='radio' name='jk' value='Perempuan' id='jk'>Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td><button type='button' name='simpan' id='simpan' onclick='updateData();'>Simpan</button></td>
                    </tr>
                </table>
            </form>`;
            }
            document.getElementById('form-tambah').innerHTML = tag;
        }
    }
    req.send();   
}