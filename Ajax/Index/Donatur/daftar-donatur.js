var req = new XMLHttpRequest();
        
        function inputData() {
            req.open('POST', 'Ajax/Index/Donatur/insertData.php', true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    alert(req.responseText);
                    if(req.responseText == "Registrasi Berhasil..") {
                        document.location.href='index.php';
                    }
                }
            }
                var namaDepan = document.getElementById('namaDepan').value;
                var namaBelakang = document.getElementById('namaBelakang').value;
                var username = document.getElementById('username').value;
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                var password_re = document.getElementById('password-re').value;
                var nik = document.getElementById('nik').value;

                let sendData = JSON.stringify({
                    'namaDepan' : namaDepan,
                    'namaBelakang' : namaBelakang,
                    'username' : username,
                    'email' : email,
                    'password' : password,
                    'password_re' : password_re,
                    'nik' : nik
                })

                req.send(sendData);
        }